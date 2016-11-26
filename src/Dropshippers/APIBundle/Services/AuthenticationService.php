<?php

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Query\AST\NullComparisonExpression;
use Dropshippers\APIBundle\Entity\LocalPsProduct;
use Dropshippers\APIBundle\Entity\Shop;
use Dropshippers\APIBundle\Entity\Module;
use Dropshippers\APIBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationService
{
    private $doctrine;
    private $categoryService;

    public function __construct(Registry $doctrine, $categoryService)
    {
        //inject doctrine at construction
        $this->doctrine = $doctrine;
        $this->categoryService  = $categoryService;
    }

    public function getTokenFromUser($username, $password)
    {
        //set variables and services
        $repository     = $this->doctrine->getRepository("DropshippersAPIBundle:User");

        //check if username and password are null
        if ($username == null || $password == NULL){
            return NULL;
        }

        //find user with the username and password
        $user = $repository->findOneBy(array("username" => $username, "password" => $password));

        //return token if user exists
        if ($user){
            return $user->getToken();
        } else {
            return NULL;
        }
    }

    public function getShopFromToken($token)
    {
        //set variables and services
        $userRepository     = $this->doctrine->getRepository("DropshippersAPIBundle:User");
        $moduleRepository   = $this->doctrine->getRepository("DropshippersAPIBundle:Module");

        //check if token is given
        if ($token == NULL){
            return NULL;
        }

        //search if an user have the token
        $user = $userRepository->findOneBy(["token" => $token]);

        //if a user is find, return the shop associated
        if ($user){
            return $user->getShop();
        }

        //search if a module is corresponding the token if not user
        $module = $moduleRepository->findOneBy(["token" => $token]);

        //if module is found, return the shop associated
        if ($module){
            return $module->getShop();
        }

        return NULL;
    }

    public function setUser($name, $email, $password, $token, $shopName)
    {
        //set variables and services
        $userRepository = $this->doctrine->getRepository("DropshippersAPIBundle:User");
        $shopRepository = $this->doctrine->getRepository("DropshippersAPIBundle:Shop");
        $em = $this->doctrine->getManager();
        $entity = new User();
        $shop = new Shop();

        //if there is a missing parameter, return -3
        if ($name == NULL || $email == NULL || $password == NULL){
            return -3;
        }

        //try to find a user with username or email
        $user = $userRepository->findOneBy(["username" => $name]);
        $user2 = $userRepository->findOneBy(["email" => $email]);

        //if a user exists with the given credentials, then throw error
        if ($user != NULL)
        return -4;
        if ($user2 != NULL)
        return -5;

        //then feed the fields
        $entity->setUsername($name);
        $entity->setEmail($email);
        $entity->setPassword($password);

        //token is given to associate a shop, and shopName
        if ($token != NULL) {
            //search if token correspond one shop
            $shop = $shopRepository->findOneBy(["token" => $token]);

            //if exists, associate it to user
            if ($shop) {
                $entity->setShop($shop);
            } else {
                return -2;
            }

        } elseif ($shopName != NULL){
            //search if shopName correspond a shop
            $shop = $shopRepository->findOneBy(["name" => $shopName]);

            //if a shop already exists, it can't be create
            if ($shop){
                return -6;
            }

            //feed the fields
            $shop = new Shop();
            $shop->setName($shopName);
            $entity->setShop($shop);
            $shop->setToken($this->generateRandomString(100));
            $shop->setCreatedAt(new \DateTime());
            $shop->setUpdatedAt(new \DateTime());
            $shop->setStatus("active");
            $shop->setDropshippersRef(uniqid("shop_"));
            $em->persist($shop);
            $module = new Module();
            $module->setName("default");
            $module->setActive(1);
            $module->setToken($this->generateRandomString(100));
            $shop->addModule($module);
            $em->persist($module);
        }

        //persist entities
        $entity->setToken($this->generateRandomString(100));
        $em->persist($entity);

        $em->flush();

        //test if entity has been correctly created
        if(null != $entity->getId())
            return 1;
        else
            return -1;
    }

    public function getTokenFromShop($user)
    {
        //TODO get token from shop
        if ($user == NULL)
            return NULL;
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getCurrentUser($token)
    {
        //set variables and services
        $result = array();
        $userRepository = $this->doctrine->getRepository("DropshippersAPIBundle:User");
        $productRepository = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");


        //find user by token
        $user = $userRepository->findOneBy(["token" => $token]);

        //return -1 if user does not exists
        if (!$user){
            return -1;
        }

        //user
        $result["user"]["username"] = $user->getUsername();
        $result["user"]["email"] = $user->getEmail();
        $result["user"]["password"] = $user->getPassword();
        $result["user"]["plainPassword"] = $user->getPlainPassword();
        $result["user"]["last_login"] = $user->getLastLogin();

        //shop
        $result["shop"]["id"] = $user->getShop()->getId();
        $result["shop"]["name"] = $user->getShop()->getName();
        $result["shop"]["status"] = $user->getShop()->getStatus();
        $result["shop"]["email"] = $user->getShop()->getMail();
        $result["shop"]["address"] = $user->getShop()->getAddress();
        $result["shop"]["zipcode"] = $user->getShop()->getAddressZipcode();
        $result["shop"]["city"] = $user->getShop()->getCity();
        $result["shop"]["url"] = $user->getShop()->getUrl();
        $result["shop"]["rib"] = $user->getShop()->getRib();
        $categories = $user->getShop()->getCategories();
        if(!empty($categories)){
            foreach ($categories as $category){
                $result["shop"]["categories"][] = $this->categoryService->normalizeCategory($category, 2);
            }
        }else{
            $result["shop"]["categories"] = null;
        }
        $result["shop"]["users_associe"] = $user->getShop()->getUsers();

        $productRepository  = $this->doctrine->getRepository("DropshippersAPIBundle:LocalPsProduct");
        $entities           = $productRepository->findBy(array("shop" => $user->getShop()));

        //sort entities in array to separate external and internal products
        foreach($entities as $product){

            $item = array();
            $item["dropshippers_ref"] = $product->getDropshippersRef();
            $images = $product->getImages();
            if(!empty($images)){
                foreach ($images as $image){
                    $item['images'][] = $image->getLink();
                }
            }else{
                $item['images'] = null;
            }
            $item["name"] = $product->getName();
            $item["price"] = $product->getPrice();
            $item['quantity'] = $product->getQuantity();
            $item['categories'] = [];
            $categories = $product->getCategories();
            if(!empty($categories)){
                foreach ($categories as $category){
                    $item['categories'][] = $this->categoryService->normalizeCategory($category, 2);
                }
            }else{
                $item['categories'] = null;
            }
            $item["description"] = $product->getDescription();
            $item["updated_at"] = $product->getUpdatedAt();

            if ($user->getShop()->getId() != $product->getShopOrigin()->getId()){
                $result['product']["external"][] = $item;
            } else {
                $result['product']["local"][] = $item;
            }
        }



        return $result;
    }
}
