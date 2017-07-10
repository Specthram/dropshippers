<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 25/07/16
 * Time: 01:16
 */

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Dropshippers\APIBundle\Entity\Country;
use Dropshippers\APIBundle\Entity\ProductRequest;
use Dropshippers\APIBundle\Entity\ProductRequestMessage;
use Dropshippers\APIBundle\Entity\Shop;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FrontService
{
    private $doctrine;
    private $base_url;
    private $countryRepository;
    private $categoryService;

    public function __construct(Registry $doctrine, $categoryService)
    {
        // inject doctrine at construction and build server address
        $this->doctrine                 = $doctrine;
        $this->base_url                 = "http://" . $_SERVER['SERVER_NAME'] . "/v1";
        $this->categoryService          = $categoryService;
        $this->countryRepository = $this->doctrine->getRepository('DropshippersAPIBundle:Country');
    }

    public function getAllProducts($filter = array())
    {
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");


        if (empty($filter)){
            $products = $productRepository->findAll();
        }else{
            $products = $productRepository->findAllWithFilters($filter);
        }

        $results = array();

        foreach($products as $product){
            $item = array();
            $item["updated_at"] = $product->getUpdatedAt();
            $item["dropshippers_ref"] = $product->getDropshippersRef();
            $images = $product->getImages();
            if(!$images->isEmpty()){
                foreach ($images as $image){
                    $item['images'][] = $image->getLink();
                }
            }else{
                $item['images'] = array();
            }
            $item["name"] = $product->getName();
            $item["price"] = $product->getPrice();
            $item['quantity'] = $product->getQuantity();
            $item['categories'] = [];
            $categories = $product->getCategories();
            if(!empty($categories)){
                foreach ($categories as $category){
                    $item['categories'][] = $this->categoryService->normalizeCategory($category, 2);
                }
            }else{
                $item['categories'] = array();
            }
            //$item['product_ref'] = $product->getReference();
            $item["description"] = $product->getDescription();
            //$item["active"] = $product->getActive();
            $item["shop"] = $product->getShop();
            $results[] = $item;
        }

        return $results;


    }

    public function getProduct($reference)
    {
        //get a single product, return empty if nothing
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $product = $productRepository->findOneBy(["dropshippersRef" => $reference]);
        $item = [];
        if ($product != null && is_object($product)){
            $item["name"] = $product->getName();
            $item["price"] = $product->getPrice();
            $item["description"] = $product->getDescription();
            $item["active"] = $product->getActive();
            $item["updated_at"] = $product->getUpdatedAt();
            $item["shopName"] = $product->getShop()->getName();
            $item["shopRef"] = $product->getShop()->getDropshippersRef();
            $item["dropshippers_ref"] = $product->getDropshippersRef();
            $item['categories'] = [];
            $categories = $product->getCategories();
            foreach ($categories as $category){
                $item['categories'][] = $category->getId();
            }
            $images = $product->getImages();
            if(!$images->isEmpty()){
                foreach ($images as $image){
                    $item['images'][] = $image->getLink();
                }
            }else{
                $item['images'] = array();
            }
        }
        return $item;
    }

    public function getAllShopPropositions($shop, $filters = null)
    {
        //get all shop propositions
        $results            = array();
        $requestRepository  = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");
        $productRef         = "";
        $requestRef         = "";
        $mem                = 0;

        //check if there is filters
        if (!is_null($filters) && !empty($filters)){
            if(isset($filters["productRef"])){
                $productRef = $filters["productRef"];
            }
            if (isset($filters['requestRef'])){
                $requestRef = $filters["requestRef"];
            }
        }

        //doctrine method to find all proposition where the shop us guest
        $propositions = $requestRepository->findBy(["shopGuest" => $shop]);

        //feed an array with results
        foreach ($propositions as $proposition){
            $mem = 0;
            $tab = array();
            $shopGuest          = $proposition->getShopGuest();
            $shopHost           = $proposition->getShopHost();
            $tab["created_at"]  = $proposition->getCreatedAt()->format(\DateTime::ISO8601);
            $tab["updated_at"]  = $proposition->getUpdatedAt()->format(\DateTime::ISO8601);
            $tab["status"]      = $proposition->getStatus();
            //$tab["quantity"]    = $proposition->getQuantity();
            $tab["requestRef"]  = $proposition->getDropshippersRef();
            $tab["shopGuest"]["name"]   = $shopGuest->getName();
            $tab["shopGuest"]["id"]     = $shopGuest->getId();
            $tab["shopHost"]["name"]    = $shopHost->getName();
            $tab["shopHost"]["id"]      = $shopHost->getId();
            $tab["product"]["productRef"]   = $proposition->getProduct()->getDropshippersRef();
            $tab["product"]["name"]         = $proposition->getProduct()->getName();
            $tab["isSendDirectly"]      = $proposition->getIsSendDirectly();
            $tab["isWhiteMark"]         = $proposition->getIsWhiteMark();
            $tab["price"]               = $proposition->getPrice();
            $deliveryAreas      = $proposition->getDeliveryArea();

            foreach($deliveryAreas as $deliveryArea){
                $temp                   = [];
                $temp['id']             = $deliveryArea->getId();
                $temp['isoCode']        = $deliveryArea->getIsoCode();
                $temp['name']           = $deliveryArea->getName();
                $tab["deliveryArea"][]  = $temp;
            }
            $messages = $proposition->getMessages();

            //get all the proposition messages
            foreach ($messages as $message){
                $mess = array();
                $mess['from']               = ['id' => $message->getAuthor()->getId(), 'name' => $message->getAuthor()->getName()];
                $mess["date"]               = $message->getCreatedAt()->format(\DateTime::ISO8601);
                $mess["message"]            = $message->getMessage();
                $mess["price"]              = $message->getPrice();
                $mess["status"]             = $message->getStatus();
                $mess["isWhiteMark"]        = $proposition->getIsWhiteMark();
                $mess["isSendDirectly"]     = $proposition->getIsSendDirectly();

                $tab["messages"][] = $mess;
            }
            if (!empty($requestRef)){
                if ($tab["product"]["RequestRef"] == $requestRef){
                    $results[] = $tab;
                } else {
                    $mem = 1;
                }
            }

            if (!empty($productRef)){
                if ($tab["product"]["productRef"] == $productRef){
                    $results[] = $tab;
                } else {
                    $mem = 1;
                }
            }

            if ($mem == 0) {
                $results[] = $tab;
            }

        }

        //doctrine method to find all proposition where the shop as host
        $propositions = $requestRepository->findBy(["shopHost" => $shop]);

        //feed array of propositions
        foreach ($propositions as $proposition){
            $mem            = 0;
            $tab            = array();
            $shopGuest      = $proposition->getShopGuest();
            $shopHost       = $proposition->getShopHost();
            $tab["created_at"]      = $proposition->getCreatedAt()->format(\DateTime::ISO8601);
            $tab["updated_at"]      = $proposition->getUpdatedAt()->format(\DateTime::ISO8601);
            $tab["status"]          = $proposition->getStatus();
            //$tab["quantity"]        = $proposition->getQuantity();
            $tab["requestRef"]      = $proposition->getDropshippersRef();
            $tab["shopGuest"]["name"]   = $shopGuest->getName();
            $tab["shopGuest"]["id"]     = $shopGuest->getId();
            $tab["shopHost"]["name"]    = $shopHost->getName();
            $tab["shopHost"]["id"]      = $shopHost->getId();
            $tab["product"]["productRef"]   = $proposition->getProduct()->getDropshippersRef();
            $tab["product"]["name"]     = $proposition->getProduct()->getName();
            $tab["isSendDirectly"]      = $proposition->getIsSendDirectly();
            $tab["isWhiteMark"]     = $proposition->getIsWhiteMark();
            $tab["price"]           = $proposition->getPrice();

            $deliveryAreas = $proposition->getDeliveryArea();
            foreach($deliveryAreas as $deliveryArea){
                $temp               = [];
                $temp['id']         = $deliveryArea->getId();
                $temp['isoCode']    = $deliveryArea->getIsoCode();
                $temp['name']       = $deliveryArea->getName();
                $tab["deliveryArea"][]  = $temp;
            }
            $messages = $proposition->getMessages();
            foreach ($messages as $message){
                $mess = array();
                $mess['from']           = ['id' => $message->getAuthor()->getId(), 'name' => $message->getAuthor()->getName()];
                $mess["date"]           = $message->getCreatedAt()->format(\DateTime::ISO8601);
                $mess["message"]        = $message->getMessage();
                $mess["price"]          = $message->getPrice();
                $mess["status"]         = $message->getStatus();
                $mess["isWhiteMark"]    = $proposition->getIsWhiteMark();
                $mess["isSendDirectly"] = $proposition->getIsSendDirectly();

                $tab["messages"][] = $mess;
            }
            if (!empty($requestRef)){
                if ($tab["product"]["RequestRef"] == $requestRef){
                    $results[] = $tab;
                } else {
                    $mem = 1;
                }
            }

            if (!empty($productRef)){
                if ($tab["product"]["productRef"] == $productRef){
                    $results[] = $tab;
                } else {
                    $mem = 1;
                }
            }

            if ($mem == 0) {
                $results[] = $tab;
            }
        }
        return $results;
    }
    
//    public function getShopPropositions($shop, $dropshippersRef)
//    {
//        //initiate variables
//        $results = array();
//        $requestRepository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");
//
//        //get all propositions in array
//        $propositions = $requestRepository->findBy(["shopGuest" => $shop, "dropshippersRef" => $dropshippersRef]);
//
//        //result array construction
//        foreach ($propositions as $proposition){
//            $tab = array();
//            $shopGuest = $proposition->getShopGuest();
//            $shopHost = $proposition->getShopHost();
//            $tab["created_at"] = $proposition->getCreatedAt()->format(\DateTime::ISO8601);
//            $tab["updated_at"] = $proposition->getUpdatedAt()->format(\DateTime::ISO8601);
//            $tab["status"] = $proposition->getStatus();
//            $tab["quantity"] = $proposition->getQuantity();
//            $tab["shopGuest"]["name"] = $shopGuest->getName();
//            $tab["shopGuest"]["id"] = $shopGuest->getId();
//            $tab["shopHost"]["name"] = $shopHost->getName();
//            $tab["shopHost"]["id"] = $shopHost->getId();
//            $tab["dropshippersRef"] = $proposition->getDropshippersRef();
//            $tab["isSendDirectly"] = $proposition->getIsSendDirectly();
//            $tab["isWhiteMark"] = $proposition->getIsWhiteMark();
//            $tab["price"] = $proposition->getPrice();
//            $deliveryAreas = $proposition->getDeliveryArea();
//            foreach($deliveryAreas as $deliveryArea){
//                $temp = [];
//                $temp['id'] = $deliveryArea->getId();
//                $temp['isoCode'] = $deliveryArea->getIsoCode();
//                $temp['name'] = $deliveryArea->getName();
//                $tab["deliveryArea"][] = $temp;
//            }
//            $tab["productDropshippersRef"] = $proposition->getProduct()->getDropshippersRef();
//
//            //get all message propositions
//            $messages = $proposition->getMessages();
//
//            //construct message array
//            foreach ($messages as $message){
//                $mess = array();
//                $mess['from']               = ['id' => $message->getAuthor()->getId(), 'name' => $message->getAuthor()->getName()];
//                $mess["date"] = $message->getCreatedAt()->format(\DateTime::ISO8601);
//                $mess["message"] = $message->getMessage();
//                $mess["price"] = $message->getPrice();
//                $mess["status"] = $message->getStatus();
//                $mess["isWhiteMark"] = $proposition->getIsWhiteMark();
//                $mess["isSendDirectly"] = $proposition->getIsSendDirectly();
//                $tab["messages"][] = $mess;
//            }
//            $results[] = $tab;
//        }
//
//        //get all propositions as host
//        $propositions = $requestRepository->findBy(["shopHost" => $shop, "dropshippersRef" => $dropshippersRef]);
//
//        //resume construct array
//        foreach ($propositions as $proposition){
//            $tab = array();
//            $shopGuest = $proposition->getShopGuest();
//            $shopHost = $proposition->getShopHost();
//            $tab["created_at"] = $proposition->getCreatedAt()->format(\DateTime::ISO8601);
//            $tab["updated_at"] = $proposition->getUpdatedAt()->format(\DateTime::ISO8601);
//            $tab["status"] = $proposition->getStatus();
//            $tab["quantity"] = $proposition->getQuantity();
//            $tab["shopGuest"]["name"] = $shopGuest->getName();
//            $tab["shopGuest"]["id"] = $shopGuest->getId();
//            $tab["shopHost"]["name"] = $shopHost->getName();
//            $tab["shopHost"]["id"] = $shopHost->getId();
//            $tab["dropshippersRef"] = $proposition->getDropshippersRef();
//            $tab["isSendDirectly"] = $proposition->getIsSendDirectly();
//            $tab["price"] = $proposition->getPrice();
//            $tab["isWhiteMark"] = $proposition->getIsWhiteMark();
//            $deliveryAreas = $proposition->getDeliveryArea();
//            foreach($deliveryAreas as $deliveryArea){
//                $temp = [];
//                $temp['id'] = $deliveryArea->getId();
//                $temp['isoCode'] = $deliveryArea->getIsoCode();
//                $temp['name'] = $deliveryArea->getName();
//                $tab["deliveryArea"][] = $temp;
//            }
//            $tab["productDropshippersRef"] = $proposition->getProduct()->getDropshippersRef();
//
//            //get proposition messages
//            $messages = $proposition->getMessages();
//
//            //construct message array and put it in propositions
//            foreach ($messages as $message){
//                $mess = array();
//                $mess['from']               = ['id' => $message->getAuthor()->getId(), 'name' => $message->getAuthor()->getName()];
//                $mess["date"] = $message->getCreatedAt()->format(\DateTime::ISO8601);
//                $mess["message"] = $message->getMessage();
//                $mess["price"] = $message->getPrice();
//                $mess["status"] = $message->getStatus();
//                $mess["isWhiteMark"] = $proposition->getIsWhiteMark();
//                $mess["isSendDirectly"] = $proposition->getIsSendDirectly();
//                $tab["messages"][] = $mess;
//            }
//            $results[] = $tab;
//        }
//
//        return $results;
//    }

    public function registerProductRequest($shopHost, $paramsArray)
    {
        //set variable and services
        $entityManager      = $this->doctrine->getManager();
        $productService     = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");

        //get the product to check if it exist and if it's the shop product
        $product = $productService->findOneBy(["dropshippersRef" => $paramsArray["productRequest"]]);

        //checking if product exists and if it is owned by the shop
        if(!$product)
            return -1;
        if ($product->getShop()->getId() == $shopHost->getId()){
            return -3;
        }

        //initiate objects
        $productRequest = new ProductRequest();
        $messageRequest = new ProductRequestMessage();

        //the product owner is always the guest
        $shopGuest = $product->getShopOrigin();

        //feeding fields
        $productRequest->setShopGuest($shopGuest);
        $productRequest->setShopHost($shopHost);

        $productRequest->setDropshippersRef($this->generateRequestRef($shopHost->getName(), $shopGuest->getName()));
        $productRequest->setCreatedAt(new \DateTime());
        $productRequest->setUpdatedAt(new \DateTime());
        $productRequest->setStatus("new");
        $productRequest->setProduct($product);
        $productRequest->setPrice($paramsArray["price"]);
        $productRequest->setIsSendDirectly($paramsArray["isSendDirectly"]);
        $productRequest->setIsWhiteMark($paramsArray["isWhiteMark"]);
        foreach ($paramsArray['deliveryArea'] as $area) {
            $country    = $this->countryRepository->find($area);
            if ($country){
                $productRequest->addDeliveryArea($country);
            }
        }
        //$productRequest->setMessage($paramsArray["message"]);

        //set message when request is created
        $messageRequest->setCreatedAt(new \DateTime());
        $messageRequest->setUpdatedAt(new \DateTime());
        $messageRequest->setMessage($paramsArray["message"]);
        $messageRequest->setPrice($paramsArray["price"]);
        $messageRequest->setStatus("waiting");
        $messageRequest->setIsSendDirectly($paramsArray["isWhiteMark"]);
        $messageRequest->setIsWhiteMark($paramsArray["isSendDirectly"]);
        $messageRequest->setAuthor($shopHost);
        $messageRequest->setProductRequest($productRequest);

        //persist data
        $entityManager->persist($productRequest);
        $entityManager->persist($messageRequest);

        $entityManager->flush();

        return $productRequest->getDropshippersRef();
    }

    public function modifyProductRequest($shopHost, $instructions, $dropshippersRef)
    {
        //setting variables
        $em = $this->doctrine->getManager();
        $repository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $allowedValues = ["new", "waiting", "refused", "accepted"];

        //checking if the json is correctly constructed
        foreach($instructions as $instruction){
            if (!isset($instruction->op)){
                return -1;
            } elseif (!isset($instruction->path)){
                return -2;
            } elseif (!isset($instruction->value)){
                return -3;
            }

            //proceed to managed operations
            if ($instruction->op == "replace"){
                //for the moment /status is the only implemented method
                if ($instruction->path == "/status"){
                    if (in_array($instruction->value, $allowedValues)){
                        $productRequest = $repository->findOneBy(["dropshippersRef" => $dropshippersRef]);
                        if (!$productRequest){
                            return -7;
                        } elseif ($productRequest->getStatus() == "accepted") {
                            return -9;
                        } else {
                            //only if accepted is the new state
                            if ($instruction->value == "accepted" && $productRequest->getStatus() != "accepted"){
                                $product = $productRequest->getProduct();
                                if ($product->getQuantity() > 0)
                                {
                                    $newProduct = clone $product;
                                    //$product->setQuantity($product->getQuantity() - $productRequest->getQuantity());
                                    //$product->setQuantity($productRequest->getQuantity()); //fait juste une copie de la quantité de stock initiale donc commenté, faut le synchroniser de temps en temps
                                    $product->setUpdatedAt(new \DateTime());
                                    $newProduct->setCreatedAt(new \DateTime());
                                    $newProduct->setUpdatedAt(new \DateTime());
                                    $newProduct->setQuantity($productRequest->getQuantity());
                                    $newProduct->setShop($productRequest->getShopHost());
                                    $newProduct->setProductOrigin($product);
                                    $newProduct->setDropshippersRef($this->generateRandomRef($shopHost->getName()));
                                    $em->persist($product);
                                    $em->persist($newProduct);

                                    //notify merchant than the state has changed on accepted
                                    //$this->notifyMerchants($productRequest);
                                } else {
                                    return -8;
                                }
                            }
                            //proceed to state changing
                            $productRequest->setStatus($instruction->value);
                            $productRequest->setUpdatedAt(new \DateTime());
                            $em->persist($productRequest);
                        }
                    } else {
                        return -6;
                    }
                } else {
                    return -5;
                }
            } else {
                return -4;
            }
        }
        $em->flush();
        return 0;
    }

    //fonction to generate refs
    private function generateRequestRef($hostName, $guestName)
    {
        $dropRef = strtoupper("REQ-" . strtoupper(substr($hostName, 0, 3)) . "-" . strtoupper(substr($guestName, 0, 3)) . "-" . $this->generateRandomString(15));
        $repository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");
        $flag = 1;
        while ($flag){
            $product = $repository->findOneBy(array("dropshippersRef" => $dropRef));
            if (!$product){
                $flag = 0;
            } else {
                $dropRef = strtoupper("REQ-" . strtoupper(substr($hostName, 0, 3)) . "-" . strtoupper(substr($guestName, 0, 3)) . "-" . $this->generateRandomString(15));
            }
        }
        return $dropRef;
    }

    //function used by ref generator
    private function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getModulebyShop($shop)
    {
        //initiate variables
        $result = array();
        $module = $this->doctrine->getRepository("DropshippersAPIBundle:Module")->findBy(["shop" => $shop]);

        //return -1 if module is not found
        if (!$module){
            return -1;
        }

        //contruct array with all shop modules
        foreach($module as $key => $mod){
            $result[$key]["name"] = $mod->getName();
            $result[$key]["type"] = $mod->getType();
            $result[$key]["token"] = $mod->getToken();
        }

        return $result;
    }

    /**
     * This method is fired when a productRequest is set to accepted
     */
    public function notifyMerchants($productRequest)
    {
        $moduleRepository = $this->doctrine->getRepository("DropshippersAPIBundle:Module");
        $shopRepository   = $this->doctrine->getRepository('DropshippersAPIBundle:Shop');
        $moduleGuest      = $moduleRepository->findOneBy(array('shop_id' => $productRequest->getShopGuest()));
        $shopHost         = $shopRepository->findOneById($productRequest->getShopHost());
        $guzzle           = new GuzzleHttp\Client(['base_uri' => $moduleGuest->getNotificationLink()]);
        $params           = array(
            'action'       => 'createCustomer',
            'shop_name'    => $shopHost->getName(),
            'shop_email'   => $shopHost->getMail(),
            'shop_address' => $shopHost->getAddress(),
            'shop_city'    => $shopHost->getCity(),
            'shop_url'     => $shopHost->getUrl(),
        );

        // Create a new Customer on the guest store
        try {
            $response = $guzzle->request(
                'POST',
                '/',
                $params
            );
        } catch (RequestException $e) {
            //TODO
        }
    }

    public function postPropositionMessage($dropshippersRef, $json, Shop $shop){
        //initiate variables
        $repository         = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");
        $request            = $repository->findOneBy(["dropshippersRef" => $dropshippersRef]);
        $em                 = $this->doctrine->getManager();

        $results = array();

        //return -1 if request does not exists
        if (!$request){
            return -1;
        }

        //check if json contains correct fields
        if (!isset($json->message) || !isset($json->price) ||
            !isset($json->isWhiteMark) || !isset($json->isSendDirectly)){
            return -2;
        }

        $message = new ProductRequestMessage();
        $message->setAuthor($shop);
        $message->setCreatedAt(new \DateTime());
        $message->setUpdatedAt(new \DateTime());
        $message->setIsSendDirectly($json->isSendDirectly);
        $message->setMessage($json->message);
        $message->setPrice($json->price);
        $message->setStatus("waiting");
        $message->setIsWhiteMark($json->isWhiteMark);
        $message->setProductRequest($request);

        $em->persist($message);
        $em->flush();
    }

    public function getPropositionMessages($dropshippersRef)
    {
        //initiate variables
        $repository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");
        $request = $repository->findOneBy(["dropshippersRef" => $dropshippersRef]);
        $results = array();

        //return -1 if request does not exists
        if (!$request){
            return -1;
        }

        //get all the proposition messages
        $messages = $request->getMessages();

        //construct message array
        foreach ($messages as $message){
            $tab = array();
            $tab["date"] = $message->getCreatedAt()->format(\DateTime::ISO8601);
            $tab["message"] = $message->getMessage();
            $tab["price"] = $message->getPrice();
            $tab["status"] = $message->getStatus();
            $results[] = $tab;
        }

        return $results;
    }

    private function generateRandomRef($shopName)
    {
        $dropRef = strtoupper(substr($shopName, 0, 3)) . $this->generateRandomString(5) . "-" . $this->generateRandomString(15);
        $repository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $flag = 1;
        while ($flag){
            $product = $repository->findOneBy(array("dropshippersRef" => $dropRef));
            if (!$product){
                $flag = 0;
            } else {
                $dropRef = strtoupper(substr($shopName, 0, 3)) . $this->generateRandomString(5) . "-" . $this->generateRandomString(15);
            }
        }
        return $dropRef;
    }
}
