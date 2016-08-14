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
        foreach ($json as $product){
            $entity = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct")->findOneBy(array("productId" => $product->id_product, "shop" => $shop));
            if (!$entity)
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
                $image = $this->doctrine->getRepository("DropshippersAPIBundle:LocalProductImage")->findOneBy(array('link' => $product->image_link));
                if (!$image){
                    $image = new LocalProductImage();
                    $image->setCreatedAt(new \DateTime());
                    $entity->addImage($image);
                    $image->setLocalProduct($entity);
                    $image->setType("link");
                }
                $image->setUpdatedAt(new \DateTime());
                $image->setLink($product->image_link);
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
    
    public function getSharedProducts($shop)
    {
        $tab = array();
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $products = $productRepository->findBy(array("shopOrigin" => $shop));
        foreach ($products as $product){
            if (($product->getShopOrigin()->getId()) != ($product->getShop()->getId())){
                $temp = array();
                $temp["product"]["dropshippersRef"] = $product->getDropshippersRef();
                $temp["product"]["id_local"] = $product->getProductId();
                $temp["product"]["quantity"] = $product->getQuantity();
                $temp["shop"]["name"] = $product->getShop()->getName();
                $temp["shop"]["address"] = $product->getShop()->getAddress();
                $temp["shop"]["zipcode"] = $product->getShop()->getAddressZipcode();
                $temp["shop"]["city"] = $product->getShop()->getCity();
                $tab["shared_products"][] = $temp;
            }
        }
        return $tab;
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

    // Takes a module and assigns a notification link to it
    public function registerNotificationLink($moduleId, $notificationLink)
    {
        $entityManager = $this->doctrine->getManager();
        $modulesRepository = $this->doctrine->getRepository('DropshippersAPIBundle:Module');
        $module = $modulesRepository->findOneById($moduleId);
        $module->setNotificationLink($notificationLink);
        $entityManager->persist($module);
        $entityManager->flush();
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
