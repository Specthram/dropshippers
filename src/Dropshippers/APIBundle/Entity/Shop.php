<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="ds_shop")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ShopRepository")
 */
class Shop
{
    //manage pour plu tard, id shop directement dans user
//    /**
//     * @var ArrayCollection
//     * @ORM\OneToMany(targetEntity="Manage", mappedBy="shop")
//     */
//    private $manage;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Product", mappedBy="shop")
     */
    private $products;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="PartnershipRequest", mappedBy="shop_host")
     */
    private $request_host;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="PartnershipRequest", mappedBy="shop_guest")
     */
    private $request_guest;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="User", mappedBy="shop")
     */
    private $users;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Module", mappedBy="shop")
     */
    private $modules;

    /**
     * Constructor
     */
    public function __construct()
    {
//        $this->manage = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->request_host = new ArrayCollection();
        $this->request_guest = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_status", type="string", length=255)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_phone", type="string", length=30, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_webservice_key", type="string", length=255, nullable=true)
     */
    private $webserviceKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_created_at", type="datetimetz")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_updated_at", type="datetimetz")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_address_zipcode", type="string", length=255)
     */
    private $addressZipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_city", type="string", length=255)
     */
    private $city;


    /**
     * @var string
     *
     * @ORM\Column(name="shop_address", type="string", length=255)
     */
    private $address;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Shop
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Shop
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Shop
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Shop
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Shop
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set webserviceKey
     *
     * @param string $webserviceKey
     *
     * @return Shop
     */
    public function setWebserviceKey($webserviceKey)
    {
        $this->webserviceKey = $webserviceKey;

        return $this;
    }

    /**
     * Get webserviceKey
     *
     * @return string
     */
    public function getWebserviceKey()
    {
        return $this->webserviceKey;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Shop
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Shop
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set addressZipcode
     *
     * @param string $addressZipcode
     *
     * @return Shop
     */
    public function setAddressZipcode($addressZipcode)
    {
        $this->addressZipcode = $addressZipcode;

        return $this;
    }

    /**
     * Get addressZipcode
     *
     * @return string
     */
    public function getAddressZipcode()
    {
        return $this->addressZipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Shop
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Shop
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add product
     *
     * @param \Dropshippers\APIBundle\Entity\Product $product
     *
     * @return Shop
     */
    public function addProduct(\Dropshippers\APIBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Dropshippers\APIBundle\Entity\Product $product
     */
    public function removeProduct(\Dropshippers\APIBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add requestHost
     *
     * @param \Dropshippers\APIBundle\Entity\PartnershipRequest $requestHost
     *
     * @return Shop
     */
    public function addRequestHost(\Dropshippers\APIBundle\Entity\PartnershipRequest $requestHost)
    {
        $this->request_host[] = $requestHost;

        return $this;
    }

    /**
     * Remove requestHost
     *
     * @param \Dropshippers\APIBundle\Entity\PartnershipRequest $requestHost
     */
    public function removeRequestHost(\Dropshippers\APIBundle\Entity\PartnershipRequest $requestHost)
    {
        $this->request_host->removeElement($requestHost);
    }

    /**
     * Get requestHost
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequestHost()
    {
        return $this->request_host;
    }

    /**
     * Add requestGuest
     *
     * @param \Dropshippers\APIBundle\Entity\PartnershipRequest $requestGuest
     *
     * @return Shop
     */
    public function addRequestGuest(\Dropshippers\APIBundle\Entity\PartnershipRequest $requestGuest)
    {
        $this->request_guest[] = $requestGuest;

        return $this;
    }

    /**
     * Remove requestGuest
     *
     * @param \Dropshippers\APIBundle\Entity\PartnershipRequest $requestGuest
     */
    public function removeRequestGuest(\Dropshippers\APIBundle\Entity\PartnershipRequest $requestGuest)
    {
        $this->request_guest->removeElement($requestGuest);
    }

    /**
     * Get requestGuest
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequestGuest()
    {
        return $this->request_guest;
    }

    /**
     * Add user
     *
     * @param \Dropshippers\APIBundle\Entity\User $user
     *
     * @return Shop
     */
    public function addUser(\Dropshippers\APIBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Dropshippers\APIBundle\Entity\User $user
     */
    public function removeUser(\Dropshippers\APIBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add module
     *
     * @param \Dropshippers\APIBundle\Entity\Module $module
     *
     * @return Shop
     */
    public function addModule(\Dropshippers\APIBundle\Entity\Module $module)
    {
        $this->modules[] = $module;

        return $this;
    }

    /**
     * Remove module
     *
     * @param \Dropshippers\APIBundle\Entity\Module $module
     */
    public function removeModule(\Dropshippers\APIBundle\Entity\Module $module)
    {
        $this->modules->removeElement($module);
    }

    /**
     * Get modules
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModules()
    {
        return $this->modules;
    }
}
