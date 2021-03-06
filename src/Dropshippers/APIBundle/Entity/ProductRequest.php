<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Dropshippers\APIBundle\Entity\ProductRequestMessage;

/**
 * ProductRequest
 *
 * @ORM\Table(name="ds_product_request")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ProductRequestRepository")
 */
class ProductRequest
{
    public function __construct()
    {
        $this->message = new ArrayCollection();
        $this->deliveryArea = new ArrayCollection();
    }

    /**
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="product_request_dropshippers_reference", type="string", length=255)
     */
    private $dropshippersRef;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_request_created_at", type="datetimetz")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_request_updated_at", type="datetimetz")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="product_request_status", type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\Shop")
     */
    private $shopHost;

    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\Shop")
     */
    private $shopGuest;

    /**
     * @ORM\ManyToOne(targetEntity="LocalPsProduct")
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity="ProductRequestMessage", mappedBy="productRequest")
     */
    private $messages;

    /**
     * @var float
     *
     * @ORM\Column(name="product_request_price", type="float")
     */
    private $price;

    /**
     * @var boolean
     *
     * @ORM\Column(name="product_request_isSendDirectly",type="boolean")
     */
    private $isSendDirectly;

    /**
     * @ORM\Column(name="product_request_isWhiteMark",type="boolean")
     */
    private $isWhiteMark;

    /**
     * @ORM\ManyToMany(targetEntity="Country")
     * @ORM\JoinTable(name="ds_productrequest_country",
     *     joinColumns={@ORM\JoinColumn(name="product_request_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="country_id", referencedColumnName="id")}
     * )
     */
    private $deliveryArea;


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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ProductRequest
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
     * @return ProductRequest
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
     * Set status
     *
     * @param string $status
     *
     * @return ProductRequest
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
     * Set shopHost
     *
     * @param \Dropshippers\APIBundle\Entity\Shop $shopHost
     *
     * @return ProductRequest
     */
    public function setShopHost(Shop $shopHost = null)
    {
        $this->shopHost = $shopHost;

        return $this;
    }

    /**
     * Get shopHost
     *
     * @return \Dropshippers\APIBundle\Entity\Shop
     */
    public function getShopHost()
    {
        return $this->shopHost;
    }

    /**
     * Set shopGuest
     *
     * @param \Dropshippers\APIBundle\Entity\Shop $shopGuest
     *
     * @return ProductRequest
     */
    public function setShopGuest(Shop $shopGuest = null)
    {
        $this->shopGuest = $shopGuest;

        return $this;
    }

    /**
     * Get shopGuest
     *
     * @return \Dropshippers\APIBundle\Entity\Shop
     */
    public function getShopGuest()
    {
        return $this->shopGuest;
    }

    /**
     * Set dropshippersRef
     *
     * @param string $dropshippersRef
     *
     * @return ProductRequest
     */
    public function setDropshippersRef($dropshippersRef)
    {
        $this->dropshippersRef = $dropshippersRef;

        return $this;
    }

    /**
     * Get dropshippersRef
     *
     * @return string
     */
    public function getDropshippersRef()
    {
        return $this->dropshippersRef;
    }

    /**
     * Set product
     *
     * @param \Dropshippers\APIBundle\Entity\LocalPsProduct $product
     *
     * @return ProductRequest
     */
    public function setProduct(LocalPsProduct $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Dropshippers\APIBundle\Entity\LocalPsProduct
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getIsSendDirectly()
    {
        return $this->isSendDirectly;
    }

    /**
     * @param mixed $isSendDirectly
     */
    public function setIsSendDirectly($isSendDirectly)
    {
        $this->isSendDirectly = $isSendDirectly;
    }

    /**
     * @return mixed
     */
    public function getIsWhiteMark()
    {
        return $this->isWhiteMark;
    }

    /**
     * @param mixed $isWhiteMark
     */
    public function setIsWhiteMark($isWhiteMark)
    {
        $this->isWhiteMark = $isWhiteMark;
    }

    /**
     * Add message
     *
     * @param \Dropshippers\APIBundle\Entity\ProductRequestMessage $message
     *
     * @return ProductRequest
     */
    public function addMessage(\Dropshippers\APIBundle\Entity\ProductRequestMessage $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \Dropshippers\APIBundle\Entity\ProductRequestMessage $message
     */
    public function removeMessage(\Dropshippers\APIBundle\Entity\ProductRequestMessage $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add deliveryArea
     *
     * @param \Dropshippers\APIBundle\Entity\Country $deliveryArea
     *
     * @return ProductRequest
     */
    public function addDeliveryArea(Country $deliveryArea)
    {
        $this->deliveryArea[] = $deliveryArea;

        return $this;
    }

    /**
     * Remove deliveryArea
     *
     * @param \Dropshippers\APIBundle\Entity\Country $deliveryArea
     */
    public function removeDeliveryArea(Country $deliveryArea)
    {
        $this->deliveryArea->removeElement($deliveryArea);
    }

    /**
     * Get deliveryArea
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeliveryArea()
    {
        return $this->deliveryArea;
    }
}
