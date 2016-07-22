<?php

namespace Dropshippers\APIBundle\Controller;

use Dropshippers\APIBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class UsersController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @return array
     *
     */
    public function cgetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('DropshippersAPIBundle:User')->findAll();
        return array('users' => $users);
    }


    /**
     * @param User $user
     * @return array
     * @ParamConverter("user", class="DropshippersAPIBundle:User")
     */
    public function getAction(User $user)
    {
        return array('user' => $user);
    }
}