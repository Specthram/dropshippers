<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 28/04/16
 * Time: 16:44
 */
namespace Dropshippers\APIBundle\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PrestashopController extends FOSRestController implements ClassResourceInterface
{
    /**
     * GET Route annotation.
     * @Get("/ps")
     * @return array
     */
    public function cgetAction(Request $request)
    {
        $base_url = "http://" . $_SERVER["SERVER_NAME"] . "/v1/";
        $response = array();
        $response["ignore that please"] = $base_url . "/{version}/products";
        return $response;
    }

    /**
     * POST Route annotation
     * @Post("/ps/{version}/products")
     */
    public function postProductsAction(Request $request, $version)
    {
        //cette ligne appele le service dedié au module prestashop. Il est configuré pour se construire avec doctrine dedans !
        $as = $this->get("dropshippers_api.authentication");
        $token = $request->headers->get("token");
        $shop = $as->getShopFromToken($token);
        if (!$shop){
            throw new AccessDeniedHttpException("invalid token.");
        }
        $service = $this->get("dropshippers_api.prestashop".$version);
        $content = $request->getContent();
        
        if (NULL == ($json = json_decode($content))){
            return new Response("Invalid JSON", 400);
        }

        if ($service->registerLocalProduct($request, $shop) == TRUE){
            return ["message" => "produits enregistrés."];
        } else {
            return new Response("produits non enregistrés.", 500);
        }
    }

    /**
     * Get Route annotation
     * @Get("/ps/{version}/products")
     */
    public function getProductsAction(Request $request, $version)
    {
        $service = $this->get("dropshippers_api.prestashop16");
        $response = $service->loadLocalProduct($request);
        return $response;
    }
}