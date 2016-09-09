<?php

namespace Dropshippers\APIBundle\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Patch;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class FrontController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Get Route annotation
     * @Get("/front/common/products")
     */
    public function getCommonProductsAction(Request $request)
    {
        //initiate variables
        $as             = $this->get("dropshippers_api.authentication");
        $frontService   = $this->get("dropshippers_api.front");
        $token = $request->headers->get("token");
        $filter = $request->query->all();

        //retrieve shop
        $shop = $as->getShopFromToken($token);

        //throw exception if no shop was athenticated
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }

        //return results array
        $result = $frontService->getAllProducts();

        //
        $frontService = $this->get("dropshippers_api.front");

        $result = $frontService->getAllProducts($filter);
        return array("products" => $result);
    }

    /**
     * Get Route annotation
     * @Get("/front/common/products/{refProduct}")
     */
    public function getCommmonProductsAction(Request $request, $refProduct)
    {
        //initiate variables
        $as = $this->get("dropshippers_api.authentication");
        $frontService = $this->get("dropshippers_api.front");

        //get token and retrieve shop
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);

        //throw exception if no shop was athenticated
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }

        //return result as array
        $result = $frontService->getProduct($refProduct);
        return array("product" => $result);
    }

    /**
     * Get Route annotation
     * @Get("/front/user/propositions")
     */
    public function getUserPropositionsAction(Request $request)
    {
        //initiate variables
        $filters = array();
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $frontService = $this->get("dropshippers_api.front");

        //authenticate shop with token
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);

        //throw exception if no shop was athenticated
        if (!$shop){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }

        //setting filters array
        if ($request->get("productRef")){
            $filters["productRef"] = $request->get("productRef");
        }

        //set result array and response
        $result = $frontService->getAllShopPropositions($shop, $filters);
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 1, "propositions" => $result)));
        return $response;
    }

    /**
     * Get Route annotation
     * @Get("/front/user/propositions/{dropshippersRef}")
     */
    public function getUserPropositionAction(Request $request, $dropshippersRef)
    {
        //initiate variables and services
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $frontService = $this->get("dropshippers_api.front");
        $token = $request->headers->get("token");

        //authenticating server
        $shop = $as->getShopFromToken($token);

        //throw exception if no shop was authenticated with code
        if (!$shop){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }

        //construct result and response
        $result = $frontService->getShopPropositions($shop, $dropshippersRef);
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 1,"proposition" => $result)));
        return $response;
    }

    /**
     * POST Route annotation
     * @Post("/front/user/partners/products/proposition")
     */
    public function postPartnerProductsRequestAction(Request $request)
    {
        //initiate variables and services
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $frontService = $this->get("dropshippers_api.front");

        //initiate array with parameters
        $paramsArray = array(
            "productRequest" => $request->get("product_reference"),
            "quantity" => $request->get("quantity"),
            "price" => $request->get("price"),
            "isSendDirectly" => $request->get("isSendDirectly"),
            "isWhiteMark" => $request->get("isWhiteMark"),
            "deliveryArea" => $request->get("deliveryArea"),
            "message" => $request->get("message")
        );

        $shopHost = $as->getShopFromToken($token);

        //throw exception if no shop was athenticated
        if (!$shopHost){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }
        if (in_array("", $paramsArray)){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10003, "message" => "parametres manquants")));
            return $response;
        }

        //get result from service
        $result = $frontService->registerProductRequest($shopHost, $paramsArray);

        //error gesture
        if ($result == -1){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 20001, "message" => "Le produit demandé n'existe pas")));
        } elseif ($result == -2) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 20002, "message" => "La quantité demandé n'est pas possible.")));
        } elseif ($result == -3) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 30005, "message" => "Impossible de faire une demande sur ses propres produits.")));
        } else {
            $response->setStatusCode(200);
            $response->setContent(json_encode(array("code" => 30001, "message" => "requête produit effectuée")));
        }

        return $response;
    }

    /**
     * PATCH Route annotation
     * @Patch("/front/user/propositions/{dropshippersRef}")
     */
    public function patchUserPropositionAction(Request $request, $dropshippersRef)
    {
        //setting variables and services
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $frontService = $this->get("dropshippers_api.front");
        $token = $request->headers->get("token");
        $instructions = json_decode($request->getContent());

        //if instructions are not set, return 400 error
        if (!$instructions) {
            $response->setStatusCode(400);
            $response->setContent(array("code" => 3, "message" => "content must contains json decodable syntax"));
            return $response;
        }

        //authenticating shop
        $shopHost = $as->getShopFromToken($token);

        //throw exception if no shop was athenticated
        if (!$shopHost) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }

        //get result from service
        $result = $frontService->modifyProductRequest($shopHost, $instructions, $dropshippersRef);

        //error managing
        if ($result == -1) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "op is missing in instruction")));
        } elseif ($result == -2) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "path is missing in instruction")));
        } elseif ($result == -3) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "value is missing in instruction")));
        } elseif ($result == -4) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "operation non pris en charge")));
        } elseif ($result == -5) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "path non pris en charge")));
        } elseif ($response == -6) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "value non prise en charge")));
        } elseif ($response == -7) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "Mauvaise reference")));
        } elseif ($response == -8) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 20002, "message" => "Quantité non disponible")));
        } elseif ($response == -9) {
            $response->setStatusCode(409);
            $response->setContent(json_encode(array("code" => 30004, "message" => "Modification d'une requete acceptée impossible")));
        } else {
            $response->setStatusCode(200);
            $response->setContent(json_encode(array("code" => 1, "message" => "effectué")));
        }

        return $response;
    }

    /**
     * GET Route annotation
     * @Get("/front/user/shop/modules")
     */
    public function getShopModuleByUserAction(Request $request)
    {
        //initiate variables and services
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $frontService = $this->get("dropshippers_api.front");

        $shop = $as->getShopFromToken($token);

        //throw exception if no shop was authenticated
        if (!$shop){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }

        //get result from service
        $result = $frontService->getModulebyShop($shop);

        //error managing
        if ($result == -1){
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 10007, "message" => "Aucun module trouvé")));
        } else {
            $response->setStatusCode(200);
            $response->setContent(json_encode(array("code" => 1, "resultat"=> $result)));
        }

        return $response;
    }

    /**
     * Get Route annotation
     * @Get("/front/user/propositions/{dropshippersRef}/messages")
     */
    public function getUserPropositionMessagesAction(Request $request, $dropshippersRef)
    {
        //initiate variables and services
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);
        $frontService = $this->get("dropshippers_api.front");

        //throw exception if no shop was athenticated
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }

        //get result from service
        $result = $frontService->getPropositionMessages($dropshippersRef);

        //error managing
        if ($result == -1){
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 10007, "message" => "Aucune request trouvée")));
        } else {
            $response->setStatusCode(200);
            $response->setContent(json_encode(array("code" => 1, "messages" => $result)));
        }

        return $response;
    }

    /**
     * Get Route annotation
     * @Get("/front/user")
     */
    public function getUserAction(Request $request)
    {
        //initiate variables and services
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $response = new Response();

        //authenticate server
        $shop = $as->getShopFromToken($token);

        //throw exception if no shop was athenticated
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }

        $result = $as->getCurrentUser($token);
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 1, "currentUser" => $result)));
        return $response;
    }
}
