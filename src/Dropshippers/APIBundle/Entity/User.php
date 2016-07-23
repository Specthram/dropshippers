<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;

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
//        $this->manage = new ArrayCollection();
    }

    /**
     * Set shop
     *
     * @param \Dropshippers\APIBundle\Entity\Shop $shop
     *
     * @return User
     */
    public function setShop(\Dropshippers\APIBundle\Entity\Shop $shop = null)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return \Dropshippers\APIBundle\Entity\Shop
     */
    public function getShop()
    {
        return $this->shop;
    }
}
