<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 02/06/16
 * Time: 19:56
 */

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Dropshippers\APIBundle\Entity\LocalPsProduct;
use Dropshippers\APIBundle\Entity\Shop;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class Prestashop16Service
{
    private $doctrine;

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function registerLocalProduct(Request $request, Shop $shop)
    {
        $em = $this->doctrine->getManager();
        $json = json_decode($request->getContent());
        $entities = array();
        $results = $this->doctrine->getRepository("DropshippersAPIBundle:Shop")->findAll();
        $shop = $results[0];
        foreach ($json as $product){
            $entity = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct")->findOneBy(array("productId" => $product->id_product, "shop" => $shop));
            //il manque : categories, tax, manufacturer
            if ($entity == NULL)
            {
                $entity = new LocalPsProduct();
                $entity->setCreatedAt(new \DateTime());
            }
            $entity->setProductId($product->id_product);
            $entity->setName($product->id_product);
            $entity->setActive($product->active);
            $entity->setPrice($product->price);
            $entity->setReference($product->reference);
            $entity->setEcotax($product->ecotax);
            $entity->setWeight($product->weight);
            $entity->setQuantity($product->quantity);
            $entity->setDescriptionHtml($product->description);
            $entity->setAvailableOrder($product->available_for_order);
            $entity->setUpdatedAt(new \DateTime());
            $entity->setShop($shop);
            $em->persist($entity);
        }
        $em->flush();
        return TRUE;
    }

//    public function loadLocalProduct(Request $request)
//    {
//        $em = $this->doctrine->getManager();
//        $results = $this->doctrine->getRepository("DropshippersAPIBundle:Shop")->findAll();
//        $repository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
//        $shop = $results[0];
//        $products = $repository->findBy(array("shopId" => $shop->getShop()));
//        return var_dump($products, 1);
//    }
}