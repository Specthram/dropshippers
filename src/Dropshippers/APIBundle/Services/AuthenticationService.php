<?php

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Dropshippers\APIBundle\Entity\LocalPsProduct;
use Dropshippers\APIBundle\Entity\Shop;
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
}