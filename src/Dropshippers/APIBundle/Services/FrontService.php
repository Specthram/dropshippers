<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 25/07/16
 * Time: 01:16
 */

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Dropshippers\APIBundle\Entity\ProductRequest;
use Dropshippers\APIBundle\Entity\ProductRequestMessage;
use GuzzleHttp\Exception\RequestException;

class FrontService
{
    private $doctrine;
    private $base_url;

    public function __construct(Registry $doctrine)
    {
        // inject doctrine at construction and build server address
        $this->doctrine = $doctrine;
        $this->base_url = "http://" . $_SERVER['SERVER_NAME'] . "/v1";
    }

    public function getAllProducts()
    {
        //get all procucts in base
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $products = $productRepository->findAll();
        $results = array();

        //feed an array of products
        foreach($products as $product){
            $item = array();
            $item["name"] = $product->getName();
            $item["type"] = $product->getCategories();
            $item["price"] = $product->getPrice();
            $item["images"] = $product->getImages();
            $item["description"] = $product->getDescription();
            $item["active"] = $product->getActive();
            $item["updated_at"] = $product->getUpdatedAt();
            $item["shopName"] = $product->getShop()->getName();
            $item["shopRef"] = $product->getShop()->getDropshippersRef();
            $item["dropshippers_ref"] = $product->getDropshippersRef();
            $results[] = $item;
        }

        return $results;
    }

    public function getProduct($reference)
    {
        //get a single product, return empty if nothing
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $product = $productRepository->findOneBy(["dropshippersRef" => $reference]);
        return $product;
    }

//    public function getAllShopPropositions($shop)
//    {
//        $results = array();
//        $requestRepository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");
//
//        $propositions = $requestRepository->findBy(["shopGuest" => $shop]);
//        foreach ($propositions as $proposition){
//            $tab = array();
//            $tab[] = $this->base_url . "/front/user/propositions/" . $proposition->getDropshippersRef();
//            $results["guest"][] = $tab;
//        }
//
//        $propositions = $requestRepository->findBy(["shopHost" => $shop]);
//        foreach ($propositions as $proposition){
//            $tab = array();
//            $tab[] = $this->base_url . "/front/user/propositions/" . $proposition->getDropshippersRef();
//            $results["host"][] = $tab;
//        }
//
//        return $results;
//    }

    public function getAllShopPropositions($shop, $filters)
    {
        //get all shop propositions
        $results = array();
        $requestRepository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");

        //$i is for the array index
        $i = 0;

        //check if there is filters
        if (!empty($filters)){
            if(isset($filters["productRef"])){
                $productRef = $filters["productRef"];
            }
        }

        //doctrine method to find all proposition where the shop us guest
        $propositions = $requestRepository->findBy(["shopGuest" => $shop]);

        //feed an array with results
        foreach ($propositions as $proposition){
            $tab = array();
            $shopGuest = $proposition->getShopGuest();
            $shopHost = $proposition->getShopHost();
            $tab["created_at"] = $proposition->getCreatedAt()->format(\DateTime::ISO8601);
            $tab["updated_at"] = $proposition->getUpdatedAt()->format(\DateTime::ISO8601);
            $tab["status"] = $proposition->getStatus();
            $tab["quantity"] = $proposition->getQuantity();
            $tab["RequestRef"] = $proposition->getDropshippersRef();
            $tab["shopGuest"]["name"] = $shopGuest->getName();
            $tab["shopGuest"]["id"] = $shopGuest->getId();
            $tab["shopHost"]["name"] = $shopHost->getName();
            $tab["shopHost"]["id"] = $shopHost->getId();
            $tab["product"]["productRef"] = $proposition->getProduct()->getDropshippersRef();
            $tab["product"]["name"] = $proposition->getProduct()->getName();
            $tab["dropshippersRef"] = $proposition->getDropshippersRef();
            $tab["isSendDirectly"] = $proposition->getIsSendDirectly();
            $tab["isWhiteMark"] = $proposition->getIsWhiteMark();
            $tab["price"] = $proposition->getPrice();
            $tab["deliveryArea"] = $proposition->getDeliveryArea();
            $messages = $proposition->getMessages();

            //get all the proposition messages
            foreach ($messages as $message){
                $mess = array();
                $mess["date"] = $message->getCreatedAt()->format(\DateTime::ISO8601);
                $mess["message"] = $message->getMessage();
                $mess["price"] = $message->getPrice();
                $mess["status"] = $message->getStatus();
                $mess["isWhiteMark"] = $proposition->getIsWhiteMark();
                $mess["isSendDirectly"] = $proposition->getIsSendDirectly();
                $mess["deliveryArea"] = $proposition->getDeliveryArea();
                $tab["messages"][] = $mess;
            }
            if (isset($productRef)){
                if ($tab["product"]["productRef"] == $productRef){
                    $results[$i][] = $tab;
                    $i++;
                }
            } else {
                $results[$i][] = $tab;
                $i++;
            }
        }

        //doctrine method to find all proposition where the shop as host
        $propositions = $requestRepository->findBy(["shopHost" => $shop]);

        //feed array of propositions
        foreach ($propositions as $proposition){
            $tab = array();
            $shopGuest = $proposition->getShopGuest();
            $shopHost = $proposition->getShopHost();
            $tab["created_at"] = $proposition->getCreatedAt()->format(\DateTime::ISO8601);
            $tab["updated_at"] = $proposition->getUpdatedAt()->format(\DateTime::ISO8601);
            $tab["status"] = $proposition->getStatus();
            $tab["quantity"] = $proposition->getQuantity();
            $tab["requestRef"] = $proposition->getDropshippersRef();
            $tab["shopGuest"]["name"] = $shopGuest->getName();
            $tab["shopGuest"]["id"] = $shopGuest->getId();
            $tab["shopHost"]["name"] = $shopHost->getName();
            $tab["shopHost"]["id"] = $shopHost->getId();
            $tab["product"]["productRef"] = $proposition->getProduct()->getDropshippersRef();
            $tab["product"]["name"] = $proposition->getProduct()->getName();
            $tab["dropshippersRef"] = $proposition->getDropshippersRef();
            $tab["isSendDirectly"] = $proposition->getIsSendDirectly();
            $tab["isWhiteMark"] = $proposition->getIsWhiteMark();
            $tab["price"] = $proposition->getPrice();
            $tab["deliveryArea"] = $proposition->getDeliveryArea();
            $messages = $proposition->getMessages();
            foreach ($messages as $message){
                $mess = array();
                $mess["date"] = $message->getCreatedAt()->format(\DateTime::ISO8601);
                $mess["message"] = $message->getMessage();
                $mess["price"] = $message->getPrice();
                $mess["status"] = $message->getStatus();
                $mess["isWhiteMark"] = $proposition->getIsWhiteMark();
                $mess["isSendDirectly"] = $proposition->getIsSendDirectly();
                $mess["deliveryArea"] = $proposition->getDeliveryArea();
                $tab["messages"][] = $mess;
            }
            if (isset($productRef)){
                if ($tab["product"]["productRef"] == $productRef){
                    $results[$i][] = $tab;
                    $i++;
                }
            } else {
                $results[$i][] = $tab;
                $i++;
            }
        }
        return $results;
    }
    
    public function getShopPropositions($shop, $dropshippersRef)
    {
        //initiate variables
        $results = array();
        $requestRepository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");

        //$i is for the array index
        $i = 0;

        //get all propositions in array
        $propositions = $requestRepository->findBy(["shopGuest" => $shop, "dropshippersRef" => $dropshippersRef]);

        //result array construction
        foreach ($propositions as $proposition){
            $tab = array();
            $shopGuest = $proposition->getShopGuest();
            $shopHost = $proposition->getShopHost();
            $tab["created_at"] = $proposition->getCreatedAt()->format(\DateTime::ISO8601);
            $tab["updated_at"] = $proposition->getUpdatedAt()->format(\DateTime::ISO8601);
            $tab["status"] = $proposition->getStatus();
            $tab["quantity"] = $proposition->getQuantity();
            $tab["shopGuest"]["name"] = $shopGuest->getName();
            $tab["shopGuest"]["id"] = $shopGuest->getId();
            $tab["shopHost"]["name"] = $shopHost->getName();
            $tab["shopHost"]["id"] = $shopHost->getId();
            $tab["dropshippersRef"] = $proposition->getDropshippersRef();
            $tab["isSendDirectly"] = $proposition->getIsSendDirectly();
            $tab["isWhiteMark"] = $proposition->getIsWhiteMark();
            $tab["price"] = $proposition->getPrice();
            $tab["deliveryArea"] = $proposition->getDeliveryArea();
            $tab["productDropshippersRef"] = $proposition->getProduct()->getDropshippersRef();

            //get all message propositions
            $messages = $proposition->getMessages();

            //construct message array
            foreach ($messages as $message){
                $mess = array();
                $mess["date"] = $message->getCreatedAt()->format(\DateTime::ISO8601);
                $mess["message"] = $message->getMessage();
                $mess["price"] = $message->getPrice();
                $mess["status"] = $message->getStatus();
                $mess["isWhiteMark"] = $proposition->getIsWhiteMark();
                $mess["isSendDirectly"] = $proposition->getIsSendDirectly();
                $mess["deliveryArea"] = $proposition->getDeliveryArea();
                $tab["messages"][] = $mess;
            }
            $results[$i][] = $tab;
            $i++;
        }

        //get all propositions as host
        $propositions = $requestRepository->findBy(["shopHost" => $shop, "dropshippersRef" => $dropshippersRef]);

        //resume construct array
        foreach ($propositions as $proposition){
            $tab = array();
            $shopGuest = $proposition->getShopGuest();
            $shopHost = $proposition->getShopHost();
            $tab["created_at"] = $proposition->getCreatedAt()->format(\DateTime::ISO8601);
            $tab["updated_at"] = $proposition->getUpdatedAt()->format(\DateTime::ISO8601);
            $tab["status"] = $proposition->getStatus();
            $tab["quantity"] = $proposition->getQuantity();
            $tab["shopGuest"]["name"] = $shopGuest->getName();
            $tab["shopGuest"]["id"] = $shopGuest->getId();
            $tab["shopHost"]["name"] = $shopHost->getName();
            $tab["shopHost"]["id"] = $shopHost->getId();
            $tab["dropshippersRef"] = $proposition->getDropshippersRef();
            $tab["isSendDirectly"] = $proposition->getIsSendDirectly();
            $tab["price"] = $proposition->getPrice();
            $tab["isWhiteMark"] = $proposition->getIsWhiteMark();
            $tab["deliveryArea"] = $proposition->getDeliveryArea();
            $tab["productDropshippersRef"] = $proposition->getProduct()->getDropshippersRef();

            //get proposition messages
            $messages = $proposition->getMessages();

            //construct message array and put it in propositions
            foreach ($messages as $message){
                $mess = array();
                $mess["date"] = $message->getCreatedAt()->format(\DateTime::ISO8601);
                $mess["message"] = $message->getMessage();
                $mess["price"] = $message->getPrice();
                $mess["status"] = $message->getStatus();
                $mess["isWhiteMark"] = $proposition->getIsWhiteMark();
                $mess["isSendDirectly"] = $proposition->getIsSendDirectly();
                $mess["deliveryArea"] = $proposition->getDeliveryArea();
                $tab["messages"][] = $mess;
            }
            $results[$i][] = $tab;
            $i++;
        }

        return $results;
    }

    public function registerProductRequest($shopHost, $paramsArray)
    {
        $entityManager = $this->doctrine->getManager();

        //get the product to check if it exist and if it's the shop product
        $product = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct")->findOneBy(["dropshippersRef" => $paramsArray["productRequest"]]);

        //checking if product exists and if it is owned by the shop
        if(!$product)
            return -1;
        if ($product->getShop()->getId() == $shopHost->getId()){
            return -3;
        }

        //initiate objects
        $productRequest = new ProductRequest();
        $messageRequest = new ProductRequestMessage();

        //check if the requested quantity is great
        if ($paramsArray["quantity"] < $product->getQuantity()) {
            $productRequest->setQuantity($paramsArray["quantity"]);
        } else {
            return -2;
        }

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
        $productRequest->setDeliveryArea($paramsArray["deliveryArea"]);
        $productRequest->setMessage($paramsArray["message"]);

        //set message when request is created
        $messageRequest->setCreatedAt(new \DateTime());
        $messageRequest->setUpdatedAt(new \DateTime());
        $messageRequest->setMessage($paramsArray["message"]);
        $messageRequest->setPrice($paramsArray["price"]);
        $messageRequest->setStatus("waiting");
        $messageRequest->setIsSendDirectly($paramsArray["isWhiteMark"]);
        $messageRequest->setIsWhiteMark($paramsArray["isSendDirectly"]);
        $messageRequest->setDeliveryArea($paramsArray["deliveryArea"]);
        $messageRequest->setProductRequest($productRequest);

        //persist data
        $entityManager->persist($productRequest);
        $entityManager->persist($messageRequest);

        $entityManager->flush();

        return 0;
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
                            if ($instruction->value == "accepted"){
                                $product = $productRequest->getProduct();
                                if (($product->getQuantity() - $productRequest->getQuantity()) >= 0){
                                    $newProduct = clone $product;
                                    $product->setQuantity($product->getQuantity() - $productRequest->getQuantity());
                                    $product->setUpdatedAt(new \DateTime());
                                    $newProduct->setCreatedAt(new \DateTime());
                                    $newProduct->setUpdatedAt(new \DateTime());
                                    $newProduct->setQuantity($productRequest->getQuantity());
                                    $newProduct->setShop($shopHost);
                                    $newProduct->setDropshippersRef($this->generateRandomRef($shopHost->getName()));
                                    $em->persist($product);
                                    $em->persist($newProduct);

                                    //notify merchant than the state has
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
