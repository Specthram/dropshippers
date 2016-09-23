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
        //set variables and services
        $response           = new Response();
        $username           = $request->get('username');
        $password           = $request->get('password');
        $notificationLink   = $request->get('notificationLink');
        $as                 = $this->get("dropshippers_api.authentication");

        //get token from username and password
        $token = $as->getTokenFromUser($username, $password);

        //if no token found return 403
        if ($token == NULL){
            $response->setContent(json_encode(array("code" => 10001, "message" => "invalid credentials")));
            $response->setStatusCode(403);
            return $response;
        }

        //return notification link to module if exists
        if (isset($notificationLink) && !empty($notificationLink)) {
            $shop = $as->getShopFromToken($token);
            //FIXME : how to identify which module to get?
            $module = $shop->getModules()->first();
            $prestashop16Service = $this->get("dropshippers_api.prestashop16");
            $prestashop16Service->registerNotificationLink($module->getId(), $notificationLink);
        }

        //return response
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 10008, "token" => $token, "message" => "authentification réussie")));
        return $response;
    }

    /**
     * POST Route annotation
     * @Post("/login/register")
     */
    public function postRegisterAction(Request $request)
    {
        //set variables and services
        $response       = new Response();
        $username       = $request->get('username');
        $email          = $request->get('email');
        $password       = $request->get('password');
        $token          = $request->get('token');
        $shopName       = $request->get("shop_name");
        //$body = $request->getContent();
        //TODO prendre les infos du body et non des parametres (voir ci dessus le debut
        $auth_service   = $this->get("dropshippers_api.authentication");

        //set user with service
        $result = $auth_service->setUser($username, $email, $password, $token, $shopName);

        //error managing
        if ($result == -1){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10003, "message" => "Registration failed")));
            return $response;
        }
        elseif ($result == -2) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }
        elseif ($result == -3) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 2, "message" => "paramètres manquants")));
            return $response;
        }
        elseif ($result == -4) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10004, "message" => "Utilisateur existant")));
            return $response;
        }
        elseif ($result == -5) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10007, "message" => "email deja enregistré")));
            return $response;
        } elseif($result == -6){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10005, "message" => "Boutique deja existante")));
            return $response;
        }

        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 10006, "message" => "Registration successful")));
        return $response;
    }
}
