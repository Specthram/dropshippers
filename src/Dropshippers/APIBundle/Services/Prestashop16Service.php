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
use Dropshippers\APIBundle\Entity\LocalProductImage;
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
        foreach ($json as $product){
            $entity = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct")->findOneBy(array("productId" => $product->id_product, "shop" => $shop));
            if ($entity == NULL)
            {
                $entity = new LocalPsProduct();
                $entity->setCreatedAt(new \DateTime());
            }
            $entity->setProductId($product->id_product);
            $entity->setName($product->name);
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
            $entity->setShopOrigin($shop);
            $entity->setDropshippersRef($this->generateRandomRef($shop->getName()));
            if (isset($product->image_link)){
                $image = new LocalProductImage();
                $image->setType("link");
                $image->setCreatedAt(new \DateTime());
                $image->setUpdatedAt(new \DateTime());
                $image->setLink($product->image_link);
                $entity->addImage($image);
            }
            $em->persist($entity);
            $em->flush();
        }
        return TRUE;
    }

    public function getShopLocalProducts($shop)
    {
        $tab = array();
        $entities = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct")->findBy(array("shop" => $shop));
        foreach($entities as $entity){
            if ($shop->getId() != $entity->getShopOrigin()->getId()){
                $tab["external"][] = $entity;
            } else {
                $tab["local"][] = $entity;
            }
        }
        return $tab;
    }
    
    public function getCheckProductPresence(Shop $shop, $id)
    {
        $entity = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct")->findOneBy(array("productId" => $id, "shop" => $shop));
        if ($entity){
            return True;
        } else {
            return False;
        }
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

    private function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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