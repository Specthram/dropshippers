<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 25/07/16
 * Time: 01:16
 */

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;

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
}