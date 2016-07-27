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

    public function registerProductRequest($shopGuest, $shopHostId, $products){


        $entityManager = $this->doctrine->getManager();

        $shopHost = $this->doctrine->getRepository("DropshippersAPIBundle:Shop")->findBy(["id" => $shopHostId]);

        $productRequest = new ProductRequest();
        $productRequest->setShopGuest($shopGuest);
        $productRequest->setShopHost($shopHost[0]);
        $productRequest->setCreatedAt(new \DateTime());
        $productRequest->setUpdatedAt(new \DateTime());
        $productRequest->setStatus("new");


        // faudrai opti pour pouvoir sur une row avoir tout les produits de la demande
        foreach($products as $prod){
            $productRequest->setProducts($prod);
        }

        $entityManager->persist($productRequest);
        $entityManager->flush();
    }
}