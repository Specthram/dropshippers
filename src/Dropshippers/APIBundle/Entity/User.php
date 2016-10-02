<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

// manage pour plus tard
//    /**
//     * @var ArrayCollection
//     * 
//     * @ORM\OneToMany(targetEntity="Manage", mappedBy="user")
//     */
//    private $manage;

    /**
     * @ORM\ManyToOne(targetEntity="Shop")
     */
    private $shop;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set shop
     *
     * @param \Dropshippers\APIBundle\Entity\Shop $shop
     *
     * @return User
     */
    public function setShop(Shop $shop = null){

        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return \Dropshippers\APIBundle\Entity\Shop
     *
     */
    public function getShop(){

        return $this->shop;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
