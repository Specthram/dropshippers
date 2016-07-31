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

class FrontService
{
    private $doctrine;
    private $base_url;

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->base_url = "http://" . $_SERVER['SERVER_NAME'] . "/v1";
    }

//    public function getAllProducts()
//    {
//        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
//        $products = $productRepository->findAll();
//        $refs = array();
//        foreach($products as $product){
//            $refs[] = "http://" . $_SERVER['SERVER_NAME'] . "/v1/front/common/products/" . $product->getDropshippersRef();
//        }
//        return $refs;
//    }

    public function getAllProducts()
    {
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $products = $productRepository->findAll();
        $results = array();
        foreach($products as $product){
            $results[] = $product;
        }
        return $results;
    }

    public function getProduct($reference)
    {
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

    public function getAllShopPropositions($shop)
    {
        $results = array();
        $requestRepository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");

        $propositions = $requestRepository->findBy(["shopGuest" => $shop]);
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
            $results["guest"][] = $tab;
        }

        $propositions = $requestRepository->findBy(["shopHost" => $shop]);
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
            $results["host"][] = $tab;
        }

        return $results;
    }
    
    public function getShopPropositions($shop, $dropshippersRef)
    {
        $results = array();
        $requestRepository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");

        $propositions = $requestRepository->findBy(["shopGuest" => $shop, "dropshippersRef" => $dropshippersRef]);
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
            $results["guest"][] = $tab;
        }

        $propositions = $requestRepository->findBy(["shopHost" => $shop, "dropshippersRef" => $dropshippersRef]);
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
            $results["host"][] = $tab;
        }

        return $results;
    }

    public function registerProductRequest($shopHost, $product, $quantity)
    {

        $entityManager = $this->doctrine->getManager();
        $product = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct")->findOneBy(["dropshippersRef" => $product]);
        if(!$product)
            return -1;

        $productRequest = new ProductRequest();

        if ($quantity < $product->getQuantity())
            $productRequest->setQuantity($quantity);
        else
            return -2;

        $shopGuest = $product->getShopOrigin();

        $productRequest->setShopGuest($shopGuest);
        $productRequest->setShopHost($shopHost);

        $productRequest->setDropshippersRef($this->generateRequestRef($shopHost->getName(), $shopGuest->getName()));
        $productRequest->setCreatedAt(new \DateTime());
        $productRequest->setUpdatedAt(new \DateTime());
        $productRequest->setStatus("new");
        $productRequest->setProduct($product);
        
        $entityManager->persist($productRequest);
        $entityManager->flush();

        return 0;
    }
    
    public function modifyProductRequest($shopHost, $instructions, $dropshippersRef)
    {
        $em = $this->doctrine->getManager();
        $repository = $this->doctrine->getRepository("DropshippersAPIBundle:ProductRequest");
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $allowedValues = ["new", "waiting", "refused", "accepted"];
        foreach($instructions as $instruction){
            if (!isset($instruction->op)){
                return -1;
            } elseif (!isset($instruction->path)){
                return -2;
            } elseif (!isset($instruction->value)){
                return -3;
            }
            if ($instruction->op == "replace"){
                if ($instruction->path == "/status"){
                    if (in_array($instruction->value, $allowedValues)){
                        $productRequest = $repository->findOneBy(["dropshippersRef" => $dropshippersRef]);
                        if (!$productRequest){
                            return -7;
                        } elseif ($productRequest->getStatus() == "accepted") {
                            return -9;
                        } else {
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
                                } else {
                                    return -8;
                                }
                            }
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

    private function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}