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

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAllProducts()
    {
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $products = $productRepository->findAll();
        $refs = array();
        foreach($products as $product){
            $refs[] = "http://" . $_SERVER['SERVER_NAME'] . "/v1/front/common/products/" . $product->getDropshippersRef();
        }
        return $refs;
    }

    public function getProduct($reference)
    {
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $product = $productRepository->findOneBy(["dropshippersRef" => $reference]);
        return $product;
    }
    
    public function getShopPropositions($shop)
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
            $tab["shopGuest"]["name"] = $shopGuest->getName();
            $tab["shopGuest"]["id"] = $shopGuest->getId();
            $tab["shopHost"]["name"] = $shopHost->getName();
            $tab["shopHost"]["id"] = $shopHost->getId();
            $results["host"][] = $tab;
        }

        return $results;
    }

    public function registerProductRequest($shopGuest, $product, $quantity)
    {

        $entityManager = $this->doctrine->getManager();


        $product = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct")->findOneBy(["id" => $product]);
        if(empty($product))
            return "Le produit demandé n'existe pas";

        $shopHost = $this->doctrine->getRepository("DropshippersAPIBundle:Shop")->findOneBy(["id" => $product->getShopOrigin()]);


        $productRequest = new ProductRequest();
        $productRequest->setShopGuest($shopGuest);
        $productRequest->setShopHost($shopHost);

        $productRequest->setDropshippersRef($this->generateRequestRef($shopHost->getName(), $shopGuest->getName()));
        $productRequest->setCreatedAt(new \DateTime());
        $productRequest->setUpdatedAt(new \DateTime());
        $productRequest->setStatus("new");

        if ($quantity <= $product->getQuantity())
            $productRequest->setQuantity($quantity);
        else
            return "La quantité demandé n'est pas possible.";
        $productRequest->setProduct($product);


        $entityManager->persist($productRequest);
        $entityManager->flush();

        return $productRequest;
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