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

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getTokenFromUser($username, $password)
    {
        if ($username == null || $password == NULL){
            return NULL;
        }

        $repository = $this->doctrine->getRepository("DropshippersAPIBundle:User");
        $user = $repository->findOneBy(array("username" => $username, "password" => $password));
        if ($user){
            return $user->getToken();
        } else {
            return NULL;
        }
    }

    public function getShopFromToken($token)
    {
        if ($token == NULL){
            return NULL;
        }
        $userRepository = $this->doctrine->getRepository("DropshippersAPIBundle:User");

        $user = $userRepository->findOneBy(["token" => $token]);
        if ($user){
            return $user->getShop();
        }
        $moduleRepository = $this->doctrine->getRepository("DropshippersAPIBundle:Module");

        $module = $moduleRepository->findOneBy(["token" => $token]);
        if ($module){
            return $module->getShop();
        }

        return NULL;
    }

    public function setUser($name, $email, $password, $token, $shopName)
    {
        if ($name == NULL || $email == NULL || $password == NULL)
            return -3;
        $userRepository = $this->doctrine->getRepository("DropshippersAPIBundle:User");
        $shopRepository = $this->doctrine->getRepository("DropshippersAPIBundle:Shop");

        $user = $userRepository->findOneBy(["username" => $name]);
        $user2 = $userRepository->findOneBy(["email" => $email]);

        if ($user != NULL)
            return -4;
        if ($user2 != NULL)
            return -5;

        $em = $this->doctrine->getManager();
        $entity = new User();
        $entity->setUsername($name);
        $entity->setEmail($email);
        $entity->setPassword($password);

        if ($token != NULL) {
            $shop = $shopRepository->findOneBy(["token" => $token]);
            if ($shop) {
                $entity->setShop($shop);
            } else {
                return -2;
            }
        } elseif ($shopName != NULL){
            $shop = $shopRepository->findOneBy(["name" => $shopName]);
            if ($shop){
                return -6;
            }
            $shop = new Shop();
            $shop->setName($shopName);
            $entity->setShop($shop);
            $shop->setToken($this->generateRandomString(100));
            $shop->setCreatedAt(new \DateTime());
            $shop->setUpdatedAt(new \DateTime());
            $shop->setStatus("active");
            $em->persist($shop);
            $module = new Module();
            $module->setName("default");
            $module->setActive(1);
            $module->setToken($this->generateRandomString(100));
            $shop->addModule($module);
            $em->persist($module);
        }
        $entity->setToken($this->generateRandomString(100));
        $em->persist($entity);

        $em->flush();

        if(null != $entity->getId())
            return 1;
        else
            return -1;
    }

    public function getTokenFromShop($user)
    {
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
}
