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
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }
        $frontService = $this->get("dropshippers_api.front");
        $result = $frontService->getAllProducts();
        return array("products" => $result);
    }

    /**
     * Get Route annotation
     * @Get("/front/common/products/{refProduct}")
     */
    public function getCommmonProductsAction(Request $request, $refProduct)
    {
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }
        $frontService = $this->get("dropshippers_api.front");
        $result = $frontService->getProduct($refProduct);
        return array("product" => $result);
    }

    /**
     * Get Route annotation
     * @Get("/front/user/propositions")
     */
    public function getUserPropositionsAction(Request $request)
    {
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);
        if (!$shop){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }
        $frontService = $this->get("dropshippers_api.front");
        $result = $frontService->getAllShopPropositions($shop);
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
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);
        if (!$shop){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }
        $frontService = $this->get("dropshippers_api.front");
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
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $productRequest = $request->get("product_reference");
        $quantity = $request->get("quantity");

        $shopHost = $as->getShopFromToken($token);
        if (!$shopHost){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }
        if (!$productRequest || !$quantity){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10003, "message" => "parametres manquants")));
            return $response;
        }

        $frontService = $this->get("dropshippers_api.front");
        $result = $frontService->registerProductRequest($shopHost, $productRequest, $quantity);

        if ($result == -1){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 20001, "message" => "Le produit demandé n'existe pas")));
        } elseif ($result == -2) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 20002, "message" => "La quantité demandé n'est pas possible.")));
        } else {
            $response->setStatusCode(200);
            $response->setContent(json_encode(array("code" => 30001, "message" => "requête produit effectuée")));
            return $response;
        }
    }

    /**
     * PATCH Route annotation
     * @Patch("/front/user/propositions/{dropshippersRef}")
     */
    public function patchUserPropositionAction(Request $request, $dropshippersRef)
    {
        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $instructions = json_decode($request->getContent());
        if (!$instructions) {
            $response->setStatusCode(400);
            $response->setContent(array("code" => 3, "message" => "content must contains json decodable syntax"));
            return $response;
        }
        $shopHost = $as->getShopFromToken($token);
        if (!$shopHost) {
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }

        $frontService = $this->get("dropshippers_api.front");
        $result = $frontService->modifyProductRequest($shopHost, $instructions, $dropshippersRef);

        if ($result == -1) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "op is missing in instruction")));
            return $response;
        } elseif ($result == -2) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "path is missing in instruction")));
            return $response;
        } elseif ($result == -3) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "value is missing in instruction")));
            return $response;
        } elseif ($result == -4) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "operation non pris en charge")));
            return $response;
        } elseif ($result == -5) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "path non pris en charge")));
            return $response;
        } elseif ($response == -6) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "value non prise en charge")));
            return $response;
        } elseif ($response == -7) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 30002, "message" => "Mauvaise reference")));
            return $response;
        } elseif ($response == -8) {
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 20002, "message" => "Quantité non disponible")));
            return $response;
        } elseif ($response == -9) {
            $response->setStatusCode(409);
            $response->setContent(json_encode(array("code" => 30004, "message" => "Modification d'une requete acceptée impossible")));
            return $response;
        }
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 1, "message" => "effectué")));
        return $response;
    }

    /**
     * GET Route annotation
     * @Get("/front/user/shop/modules")
     */
    public function getShopModuleByUserAction(Request $request){

        $response = new Response();
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");

        $shop = $as->getShopFromToken($token);

        if (!$shop){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "token invalide")));
            return $response;
        }

        $result = $this->get("dropshippers_api.front")->getModulebyShop($shop);

        if ($result == -1){
            $response->setStatusCode(422);
            $response->setContent(json_encode(array("code" => 10007, "message" => "Aucun module trouvé")));
            return $response;
        }

        $response->setStatusCode(200);
        $response->setContent(json_encode(array("code" => 1, "resultat"=> $result)));
        return $response;
    }

}
