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
use Dropshippers\APIBundle\Entity\Orders;
use Dropshippers\APIBundle\Entity\Shop;
use Dropshippers\APIBundle\Entity\LocalProductImage;
use JMS\Serializer\Tests\Fixtures\Order;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class Prestashop16Service
{
    private $doctrine;

    public function __construct(Registry $doctrine)
    {
        //injecting doctrine at service construction
        $this->doctrine = $doctrine;
    }

    public function registerLocalProduct(Request $request, Shop $shop)
    {
        //initiate variables and services
        $em                 = $this->doctrine->getManager();
        $json               = json_decode($request->getContent());
        $productRepository  = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $imageRepository    = $this->doctrine->getRepository("DropshippersAPIBundle:LocalProductImage");
        $categoryRepository = $this->doctrine->getRepository('DropshippersAPIBundle:Category');

        //loop on json products
        foreach ($json as $product){
            //check if product already exists
            $entity = $productRepository->findOneBy(array("productId" => $product->id_product, "shop" => $shop));

            //if no product was found, create a new product, for no duplication
            if (!$entity) {
                $entity     = new LocalPsProduct();
                $entity->setCreatedAt(new \DateTime());
            } else {
                $existingCategories = $entity->getCategories();
                foreach ($existingCategories as $category){
                    $entity->removeCategory($category);
                }
                $em->persist($entity);
                $em->flush();
            }

            //feed the fields
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

            //if image link is set, create new image
            if (isset($product->image_link)){
                $image = $imageRepository->findOneBy(array('link' => $product->image_link));
                if (!$image){
                    $image  = new LocalProductImage();
                    $image->setCreatedAt(new \DateTime());
                    $entity->addImage($image);
                    $image->setLocalProduct($entity);
                    $image->setType("link");
                }
                $image->setUpdatedAt(new \DateTime());
                $image->setLink($product->image_link);
            }

            //set categories
            if (isset($product->categories)){
                foreach($product->categories as $category){
                    $categoryObj = $categoryRepository->find($category);
                    if ($categoryObj){
                        $entity->addCategory($categoryObj);
                    }
                }
            }

            //persist entity
            $em->persist($entity);
            $em->flush();
        }

        return TRUE;
    }

    public function getShopLocalProducts($shop)
    {
        //initiate variables
        $tab = array();
        $productRepository  = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $entities           = $productRepository->findBy(array("shop" => $shop));

        //sort entities in array to separate external and internal products
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
        //initiate variables
        $productRepository  = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $entity             = $productRepository->findOneBy(array("productId" => $id, "shop" => $shop));

        //return true if entity exists
        if ($entity){
            return True;
        } else {
            return False;
        }
    }
    
    public function getSharedProducts($shop)
    {
        //initiate variables
        $tab = array();
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");

        //get products shared by the shop
        $products = $productRepository->findBy(array("shopOrigin" => $shop));

        //feed array with products
        foreach ($products as $product){

            //check if the shop own the product
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

    public function registerNewOrder(Shop $shop, $json)
    {
        //initiate variables
        $productRepo    = $this->doctrine->getRepository('DropshippersAPIBundle:LocalPsProduct');
        $requestRepo    = $this->doctrine->getRepository('DropshippersAPIBundle:ProductRequest');
        $em             = $this->doctrine->getManager();

        //loop on json from json if exists
        if (isset($json->productList) && !empty($json->productList)
            && isset($json->customer) && !empty($json->customer)
            && isset($json->deliveryAddress) && !empty($json->deliveryaddress)){

            foreach($json->productList as $productTab){
                //does the product have both keys
                if (!(isset($productTab['dropshippersRef']) && !empty($productTab['dropshippersRef'])
                    && isset($productTab['productQuantity']) && !empty($productTab['productQuantity']))) {
                    return -2;
                }

                //stock control
                //TODO voir comment gérer les stocks au niveau des localpsproduct, rajouter un champs idOrigin pour soustraire sur le produit d'origine ?

                $product    = $productRepo->findOneBy(['dropshippersRef' => $productTab['dropshippersRef'], 'shop' => $shop]);

                if (!$product){
                    return -3;
                }

                $request    = $requestRepo->findOneBy(['product' => $product, 'shopHost' => $shop, 'status' => 'accepted']);

                if (!$request){
                    return -4;
                }

                $order  = new Orders();

                $order->setUpdatedAt(new \DateTime());
                $order->setCreatedAt(new \DateTime());
                $order->setIsWhiteMark($request->getIsWhiteMark());
                $order->setQuantity($productTab['productQuantity']);
                $order->setCustomerEmail($json->customer->email);
                $order->setCustomerFirstname($json->customer->firstname);
                $order->setCustomerLastname($json->customer->lastname);
                $order->setCustomerPhone($json->customer->phone);
                $order->setCustomerPhoneMobile($json->customer->phoneMobile);
                $order->setIsSendDirectly($request->getIsSendDirectly());
                $order->setOrderRef($this->generateRandomRef($shop->getName()));
                $order->setProduct($product);
                $order->setShopHost($shop);
                $order->setShopGuest($product->getShopOrigin());
                $order->setStatus("new");

                $em->persist($order);
                $em->flush();
            }
        } else {
            return -2;
        }

        return 0;
    }

    //generate random ref
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

    //help to generate random ref
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
}
