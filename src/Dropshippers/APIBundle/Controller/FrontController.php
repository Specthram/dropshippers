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
        $result = $frontService->getShopPropositions($shop);
        return array("propositions" => $result);
    }

    /**
     * POST Route annotation
     * @Post("/front/user/partners/products/proposition")
     */
    public function postPartnerProductsRequestAction(Request $request)
    {
        //attention lors du requete, un host propose a un eventuel guest de vendre ses produits
        //ici le token designe le host, et donc l'id rapporté dans la requete le guest
        //attention, une requete ne peut concerner qu'un produit ainsi qu'une quantité ! Pour le moment pas besoin de plus
        //il faut verifier si la quantité ne depasse pas le stock au passage

        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $retRequest = $request->request->get("refproduit");
        $shopHostId = $request->request->get("shopHostId");
        $products = explode(",", $retRequest);

        $shopGuest = $as->getShopFromToken($token);
        if (!$shopGuest){
            throw new AccessDeniedHttpException("invalid token.");
        }

        if (empty($products) || empty($shopHostId)){
            throw new AccessDeniedHttpException("missing param.");
        }

        $frontService = $this->get("dropshippers_api.front");
        $allProduct = array();
        foreach($products as $product){
            array_push($allProduct, $frontService->getProduct($product));
            //simplifiable par la syntaxe allProduct[] = $frontService->getProduct($product);
        }

        $frontService->registerProductRequest($shopGuest, $shopHostId, $allProduct);

        return true; //return plutot un array avec message etc
    }
}