<?php

namespace Dropshippers\APIBundle\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Options;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class LoginController extends FOSRestController implements ClassResourceInterface
{
    /**
     * GET Route annotation.
     * @Get("/login")
     * @return array
     */
    public function cgetAction(Request $request)
    {
        $base_url = "http://" . $_SERVER["SERVER_NAME"] . "/api/v1/login";
        $response = array();
        $response["login"] = $base_url . "/signin";
        $response["logout"] = $base_url . "/logout";
        return $response;
    }
    
    /**
     * POST Route annotation
     * @Post("/login/signin")
     */
    public function postSigninAction(Request $request)
    {
        $response = new Response();
        $username = $request->get('username');
        $password = $request->get('password');
        $as = $this->get("dropshippers_api.authentication");
        $token = $as->getTokenFromUser($username, $password);
        if ($token == NULL){
            $response->setContent(json_encode(array("code" => 10001, "message" => "invalid credentials")));
            $response->setStatusCode(403);
            return $response;
        }
        
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 1000, "token" => $token, "message" => "authentification réussie")));
        return $response;

//        $repository = $this->getDoctrine()->getRepository("DropshippersAPIBundle:User");
//        $userManager = $this->get('fos_user.user_manager');
//
//        //$user = $userManager->findUserByUsername($username);
//        $user = $repository->findOneBy(array("username" => $username, "password" => $password));
//        var_dump($user);
//        exit();
//        if ($user) {
//            $clientManager = $this->container->get('fos_oauth_server.client_manager.default');
//            $client = $clientManager->findClientBy(array("name" => "dropshippers.io"));
//            $client_id  = $client->getPublicId();
//            $client_secret     = $client->getSecret();
//            $request->setMethod(Request::METHOD_GET);
//            $token_response = $this->forward(
//                "fos_oauth_server.controller.token:tokenAction",
//                array(),
//                array("client_id" => $client_id,
//                    "client_secret" => $client_secret,
//                    "username" => $username,
//                    "password" => $password,
//                    "grant_type" => "password"
//                )
//            );
//            return $token_response;
//        } else {
//            throw new AccessDeniedHttpException("invalid credentials.");
//        }
    }

    /**
     * POST Route annotation
     * @Post("/login/register")
     */
    public function postRegisterAction(Request $request)
    {
        $response = new Response();
        $username = $request->get('username');
        $email    = $request->get('email');
        $password = $request->get('password');
        $token    = $request->get('token');
        $shopName = $request->get("shop_name");

        $auth_service = $this->get("dropshippers_api.authentication");
        $toto = $auth_service->setUser($username, $email, $password, $token, $shopName);

        if ($toto == -1){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10003, "message" => "Registration failed")));
            return $response;
        }
        elseif ($toto == -2) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }
        elseif ($toto == -3) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 2, "message" => "paramètres manquants")));
            return $response;
        }
        elseif ($toto == -4) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10004, "message" => "Utilisateur existant")));
            return $response;
        }
        elseif ($toto == -5) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10003, "message" => "email deha enregistré")));
            return $response;
        } elseif($toto == -6){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10005, "message" => "Boutique deja existante")));
            return $response;
        }
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 10006, "message" => "Registration successful")));
        return $response;
    }
}