<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ds_shop
 *
 * @ORM\Table(name="ds_shop")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_shopRepository")
 */
class ds_shop
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gerer = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="DsGerer", mappedBy="shop")
     */
    private $gerer;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="ds_shop", mappedBy="shop")
     */
    private $products;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="shop_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $shopId;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_name", type="string", length=255)
     */
    private $shopName;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_token", type="string", length=255)
     */
    private $shopToken;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_status", type="string", length=255)
     */
    private $shopStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_phone", type="string", length=30, nullable=true)
     */
    private $shopPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_mail", type="string", length=255)
     */
    private $shopMail;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_url", type="string", length=255)
     */
    private $shopUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_webservice_key", type="string", length=255, nullable=true)
     */
    private $shopWebserviceKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_created_at", type="datetimetz")
     */
    private $shopCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_updated_at", type="datetimetz")
     */
    private $shopUpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_address_zipcode", type="string", length=255)
     */
    private $shopAddressZipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_city", type="string", length=255)
     */
    private $shopCity;


    /**
     * @var string
     *
     * @ORM\Column(name="shop_address", type="string", length=255)
     */
    private $shopAddress;

    /**
     * Set shopName
     *
     * @param string $shopName
     *
     * @return ds_shop
     */
    public function setShopName($shopName)
    {
        $this->shopName = $shopName;

        return $this;
    }

    /**
     * Get shopName
     *
     * @return string
     */
    public function getShopName()
    {
        return $this->shopName;
    }

    /**
     * Set shopToken
     *
     * @param string $shopToken
     *
     * @return ds_shop
     */
    public function setShopToken($shopToken)
    {
        $this->shopToken = $shopToken;

        return $this;
    }

    /**
     * Get shopToken
     *
     * @return string
     */
    public function getShopToken()
    {
        return $this->shopToken;
    }

    /**
     * Set shopStatus
     *
     * @param string $shopStatus
     *
     * @return ds_shop
     */
    public function setShopStatus($shopStatus)
    {
        $this->shopStatus = $shopStatus;

        return $this;
    }

    /**
     * Get shopStatus
     *
     * @return string
     */
    public function getShopStatus()
    {
        return $this->shopStatus;
    }

    /**
     * Set shopPhone
     *
     * @param string $shopPhone
     *
     * @return ds_shop
     */
    public function setShopPhone($shopPhone)
    {
        $this->shopPhone = $shopPhone;

        return $this;
    }

    /**
     * Get shopPhone
     *
     * @return string
     */
    public function getShopPhone()
    {
        return $this->shopPhone;
    }

    /**
     * Set shopMail
     *
     * @param string $shopMail
     *
     * @return ds_shop
     */
    public function setShopMail($shopMail)
    {
        $this->shopMail = $shopMail;

        return $this;
    }

    /**
     * Get shopMail
     *
     * @return string
     */
    public function getShopMail()
    {
        return $this->shopMail;
    }

    /**
     * Set shopUrl
     *
     * @param string $shopUrl
     *
     * @return ds_shop
     */
    public function setShopUrl($shopUrl)
    {
        $this->shopUrl = $shopUrl;

        return $this;
    }

    /**
     * Get shopUrl
     *
     * @return string
     */
    public function getShopUrl()
    {
        return $this->shopUrl;
    }

    /**
     * Set shopWebserviceKey
     *
     * @param string $shopWebserviceKey
     *
     * @return ds_shop
     */
    public function setShopWebserviceKey($shopWebserviceKey)
    {
        $this->shopWebserviceKey = $shopWebserviceKey;

        return $this;
    }

    /**
     * Get shopWebserviceKey
     *
     * @return string
     */
    public function getShopWebserviceKey()
    {
        return $this->shopWebserviceKey;
    }

    /**
     * Set shopCreatedAt
     *
     * @param \DateTime $shopCreatedAt
     *
     * @return ds_shop
     */
    public function setShopCreatedAt($shopCreatedAt)
    {
        $this->shopCreatedAt = $shopCreatedAt;

        return $this;
    }

    /**
     * Get shopCreatedAt
     *
     * @return \DateTime
     */
    public function getShopCreatedAt()
    {
        return $this->shopCreatedAt;
    }

    /**
     * Set shopUpdatedAt
     *
     * @param \DateTime $shopUpdatedAt
     *
     * @return ds_shop
     */
    public function setShopUpdatedAt($shopUpdatedAt)
    {
        $this->shopUpdatedAt = $shopUpdatedAt;

        return $this;
    }

    /**
     * Get shopUpdatedAt
     *
     * @return \DateTime
     */
    public function getShopUpdatedAt()
    {
        return $this->shopUpdatedAt;
    }

    /**
     * Set shopAddressZipcode
     *
     * @param string $shopAddressZipcode
     *
     * @return ds_shop
     */
    public function setShopAddressZipcode($shopAddressZipcode)
    {
        $this->shopAddressZipcode = $shopAddressZipcode;

        return $this;
    }

    /**
     * Get shopAddressZipcode
     *
     * @return string
     */
    public function getShopAddressZipcode()
    {
        return $this->shopAddressZipcode;
    }

    /**
     * Set shopCity
     *
     * @param string $shopCity
     *
     * @return ds_shop
     */
    public function setShopCity($shopCity)
    {
        $this->shopCity = $shopCity;

        return $this;
    }

    /**
     * Get shopCity
     *
     * @return string
     */
    public function getShopCity()
    {
        return $this->shopCity;
    }

    /**
     * Set shopAddress
     *
     * @param string $shopAddress
     *
     * @return ds_shop
     */
    public function setShopAddress($shopAddress)
    {
        $this->shopAddress = $shopAddress;

        return $this;
    }

    /**
     * Get shopAddress
     *
     * @return string
     */
    public function getShopAddress()
    {
        return $this->shopAddress;
    }
    /**
     * Get shopId
     *
     * @return integer
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Add gerer
     *
     * @param \Dropshippers\APIBundle\Entity\DsGerer $gerer
     *
     * @return ds_shop
     */
    public function addGerer(DsGerer $gerer)
    {
        $this->gerer[] = $gerer;

        return $this;
    }

    /**
     * Remove gerer
     *
     * @param \Dropshippers\APIBundle\Entity\DsGerer $gerer
     */
    public function removeGerer(DsGerer $gerer)
    {
        $this->gerer->removeElement($gerer);
    }

    /**
     * Get gerer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGerer()
    {
        return $this->gerer;
    }

    /**
     * Add product
     *
     * @param \Dropshippers\APIBundle\Entity\ds_shop $product
     *
     * @return ds_shop
     */
    public function addProduct(\Dropshippers\APIBundle\Entity\ds_shop $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Dropshippers\APIBundle\Entity\ds_shop $product
     */
    public function removeProduct(\Dropshippers\APIBundle\Entity\ds_shop $product)
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
}
