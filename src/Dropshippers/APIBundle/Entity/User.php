<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var ArrayCollection User $user
     *
     * @ORM\ManyToMany(targetEntity="Shop", inversedBy="users", cascade={"persist"})
     */
    private $shop;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
//        $this->manage = new ArrayCollection();
        $this->shop = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getShop()
    {
        return $this->shop;
    }

    public function setShop($items)
    {
        if ($items instanceof ArrayCollection || is_array($items)) {
            foreach ($items as $item) {
                $this->addShop($item);
            }
        } elseif ($items instanceof Shop) {
            $this->addShop($items);
        } else {
            throw new Exception("$items doit etre une fucking instance de Shop ou un array de Shop");
        }
    }

    /**
     * Add Shop
     *
     * @param Shop $shop
     */
    public function addShop(Shop $shop)
    {
        // Si l'objet fait déjà partie de la collection on ne l'ajoute pas
        if (!$this->shop->contains($shop)) {
            $this->shop->add($shop);
        }
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
