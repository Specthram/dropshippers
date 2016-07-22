<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 02/06/16
 * Time: 19:56
 */

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Dropshippers\APIBundle\Entity\ds_local_ps_product;
use Dropshippers\APIBundle\Entity\ds_shop;
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
    
    public function test()
    {
        $em = $this->doctrine->getManager();
        $users = $em->getRepository('DropshippersAPIBundle:User')->findAll();
        return array('users' => $users);
    }

    public function registerLocalProduct(Request $request)
    {
        $em = $this->doctrine->getManager();
        $json = json_decode($request->getContent());
        $entities = array();
        $results = $this->doctrine->getRepository("DropshippersAPIBundle:ds_shop")->findAll();
        $shop = $results[0];
        foreach ($json as $product){
            $entity = $this->doctrine->getRepository("DropshippersAPIBundle:ds_local_ps_product")->findOneBy(array("productLocalProductid" => $product->id_product));
            //il manque : categories, tax, manufacturer
            if ($entity == NULL)
            {
                $entity = new ds_local_ps_product();
                $entity->setProductLocalCreatedAt(new \DateTime());
            }
            $entity->setProductLocalProductid($product->id_product);
            $entity->setProductLocalName($product->id_product);
            $entity->setProductLocalActive($product->active);
            $entity->setProductLocalPrice($product->price);
            $entity->setProductLocalReference($product->reference);
            $entity->setProductLocalEcotax($product->ecotax);
            $entity->setProductLocalWeight($product->weight);
            $entity->setProductLocalQuantity($product->quantity);
            $entity->setProductLocalDescriptionHtml($product->description);
            $entity->setProductLocalAvailableOrder($product->available_for_order);
            $entity->setProductLocalUpdatedAt(new \DateTime());
            //attention a bien avoir un shop avec un id à 1 enregistré
            ///$entity->setShopId($shop);
            $em->persist($entity);
        }
        $em->flush();
        return TRUE;
    }

    public function loadLocalProduct(Request $request)
    {
        $em = $this->doctrine->getManager();
        $results = $this->doctrine->getRepository("DropshippersAPIBundle:ds_shop")->findAll();
        $repository = $this->doctrine->getRepository("DropshippersAPIBundle:ds_local_ps_product");
        $shop = $results[0];
        $products = $repository->findBy(array("shopId" => $shop->getShopId()));
        return var_dump($products, 1);
    }
}