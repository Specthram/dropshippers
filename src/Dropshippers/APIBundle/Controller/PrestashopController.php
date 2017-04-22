<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 28/04/16
 * Time: 16:44
 */
namespace Dropshippers\APIBundle\Controller;

use Dropshippers\APIBundle\Services\Prestashop16Service;
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
		//set variables and services
		$as = $this->get("dropshippers_api.authentication");
		$token = $request->headers->get("token");
		$service = $this->get("dropshippers_api.prestashop".$version);
		$content = $request->getContent();

		//find shop by token
		$shop = $as->getShopFromToken($token);

		//if no shop were found
		if (!$shop){
			throw new AccessDeniedHttpException("invalid token.");
		}

		//check if the content is json decodable
		if (NULL == ($json = json_decode($content))){
			return new Response("Invalid JSON", 400);
		}

		//save products
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
		//set variables and services
		$as         = $this->get("dropshippers_api.authentication");
		$token      = $request->headers->get("token");
		$shop       = $as->getShopFromToken($token);
		$service    = $this->get("dropshippers_api.prestashop" . $version);

		//if shop is not found
		if (!$shop){
			throw new AccessDeniedHttpException("invalid token.");
		}

		//use service to get result
		$response = $service->getShopLocalProducts($shop);
		return $response;
	}

	/**
	 * Get Route annotation
	 * @Get("/ps/{version}/products/id")
	 */
	public function getProductIdAction(Request $request)
	{
		//set variables and services
		$as         = $this->get("dropshippers_api.authentication");
		$token      = $request->headers->get("token");
		$shop       = $as->getShopFromToken($token);
		$idProduct  = $request->get("id");
		$service = $this->get("dropshippers_api.prestashop16");

		//if shop is not found throw 403
		if (!$shop){
			throw new AccessDeniedHttpException("invalid token.");
		}

		//id idProduct is not set throw missing parameter
		if (!$idProduct){
			return array("message" => "missing id parameter");
		}

		//get response from service
		$response = $service->getCheckProductPresence($shop, $idProduct);

		if ($response){
			return array("message" => "true");
		} else {
			return array("message" => "false");
		}
	}

	/**
	 * Get Route annotation
	 * @Get("/ps/{version}/shop/products/shared")
	 */
	public function getShopProductSharedAction(Request $request, $version)
	{
		//set variables and services
		$as         = $this->get("dropshippers_api.authentication");
		$token      = $request->headers->get("token");
		$shop       = $as->getShopFromToken($token);
		$service    = $this->get("dropshippers_api.prestashop" . $version);

		//throw error if no shop found
		if (!$shop){
			throw new AccessDeniedHttpException("invalid token.");
		}

		//get result from service
		$response = $service->getSharedProducts($shop);

		return $response;
	}

	/**
	 * Post Route annotation
	 * @Post("/ps/{version}/shop/orders")
	 */
	public function postShopOrdersAction(Request $request, $version)
	{
		//set variables and services
		$as                 = $this->get("dropshippers_api.authentication");
		$token              = $request->headers->get("token");
		$shop               = $as->getShopFromToken($token);
		/* @var Prestashop16Service $prestashopService */
		$prestashopService  = $this->get("dropshippers_api.prestashop" . $version);
		$json               = json_decode($request->getContent());
		$response           = new Response();

		//throw error if no shop found
		if (!$shop){
			throw new AccessDeniedHttpException("invalid token.");
		}

		if (is_null($json)){
			$response->setStatusCode(422);
			$response->setContent(json_encode(array("code" => 3, "message" => "content must contains json decodable syntax")));
			return $response;
		}

		$result = $prestashopService->registerNewOrder($shop, $json);

		if ($result == -1){
			$response->setStatusCode(422);
			$response->setContent(json_encode(array("code" => 30002, "message" => "missing field in json")));
		} else if ($result == -2) {
			$response->setStatusCode(422);
			$response->setContent(json_encode(array("code" => 30002, "message" => "there is problem in the productList")));
		} else if ($result == -3) {
			$response->setStatusCode(422);
			$response->setContent(json_encode(array("code" => 30002, "message" => "no product associated to the shop, or no product with this ref")));
		} else if ($result == -4) {
			$response->setStatusCode(422);
			$response->setContent(json_encode(array("code" => 30002, "message" => "request acceptée inexistante pour le produit")));
		} else if ($result == -5) {
			$response->setStatusCode(422);
			$response->setContent(json_encode(array("code" => 30002, "message" => "not enough stock")));
		} else {
			$response->setStatusCode(200);
			$response->setContent(json_encode(array("code" => 1, "message" => "Order registered")));
		}

		return $response;
	}

	/**
	 * Get Route annotation
	 * @Get("/ps/{version}//categories/{locale}")
	 */
	public function getCommonCategoriesAction(Request $request, $locale)
	{
		$categoryService   = $this->get("dropshippers_api.category");

		if (!$categoryService->checkLocaleExists($locale)){
			$response   = new Response();
			$response->setStatusCode(404);
			$response->setContent(json_encode(['code' => 40001, 'message' => 'locale non supportée']));
			return $response;
		}

		$result = $categoryService->constructCategoryStandardArray($locale);
		return $result;
	}

}
