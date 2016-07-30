<?php

namespace Dropshippers\APIBundle\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
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
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }
        $frontService = $this->get("dropshippers_api.front");
        $result = $frontService->getAllShopPropositions($shop);
        return array("propositions" => $result);
    }

    /**
     * Get Route annotation
     * @Get("/front/user/propositions/{dropshippersRef}")
     */
    public function getUserPropositionAction(Request $request, $dropshippersRef)
    {
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }
        $frontService = $this->get("dropshippers_api.front");
        $result = $frontService->getShopPropositions($shop, $dropshippersRef);
        return array("proposition" => $result);
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
            $response->setContent(json_encode(array("code" => 10001, "message" => "Le produit demandé n'existe pas")));
            return $response;
        }
        if (!$productRequest || !$quantity){
            $response->setStatusCode(403);
            $response->setContent(json_encode(array("code" => 10002, "message" => "Le produit demandé n'existe pas")));
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
}