<?php

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Dropshippers\APIBundle\Entity\LocalPsProduct;
use Dropshippers\APIBundle\Entity\Shop;
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

    public function setUser($name, $email, $password)
    {
        if ($name == NULL &&  $email == NULL && $password == NULL)
            return NULL;
        $em = $this->doctrine->getManager();
        $entity = new User();
        $entity->setUsername($name);
        $entity->setEmail($email);
        $entity->setPassword($password);
        $entity->setToken($this->generateRandomString(100));

        $em->persist($entity);

        $em->flush();

        if(null != $entity->getId())
            return TRUE;
        else
            return FALSE;
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