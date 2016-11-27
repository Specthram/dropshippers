<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="ds_orders")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumn(name="shop_host_id", referencedColumnName="id", nullable=false)
     */
    private $shopHost;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumn(name="shop_guest_id", referencedColumnName="id", nullable=false)
     *
     */
    private $shopGuest;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var \Dropshippers\APIBundle\Entity\LocalPsProduct
     *
     * @ORM\ManyToOne(targetEntity="LocalPsProduct")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_address", type="string", length=255)
     */
    private $deliveryAddress;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_send_directly", type="boolean")
     */
    private $isSendDirectly;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_white_mark", type="boolean")
     */
    private $isWhiteMark;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_firstname", type="string", length=255)
     */
    private $customerFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_lastname", type="string", length=255)
     */
    private $customerLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_email", type="string", length=255)
     */
    private $customerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_phone", type="string", length=255)
     */
    private $customerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_phoneMobile", type="string", length=255)
     */
    private $customerPhoneMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="order_ref", type="string", length=255)
     */
    private $orderRef;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetimetz")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetimetz")
     */
    private $updatedAt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set shopHost
     *
     * @param string $shopHost
     *
     * @return Orders
     */
    public function setShopHost($shopHost)
    {
        $this->shopHost = $shopHost;

        return $this;
    }

    /**
     * Get shopHost
     *
     * @return string
     */
    public function getShopHost()
    {
        return $this->shopHost;
    }

    /**
     * Set shopGuest
     *
     * @param string $shopGuest
     *
     * @return Orders
     */
    public function setShopGuest($shopGuest)
    {
        $this->shopGuest = $shopGuest;

        return $this;
    }

    /**
     * Get shopGuest
     *
     * @return string
     */
    public function getShopGuest()
    {
        return $this->shopGuest;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Orders
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set deliveryAddress
     *
     * @param string $deliveryAddress
     *
     * @return Orders
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * Get deliveryAddress
     *
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * Set isSendDirectly
     *
     * @param boolean $isSendDirectly
     *
     * @return Orders
     */
    public function setIsSendDirectly($isSendDirectly)
    {
        $this->isSendDirectly = $isSendDirectly;

        return $this;
    }

    /**
     * Get isSendDirectly
     *
     * @return bool
     */
    public function getIsSendDirectly()
    {
        return $this->isSendDirectly;
    }

    /**
     * Set isWhiteMark
     *
     * @param boolean $isWhiteMark
     *
     * @return Orders
     */
    public function setIsWhiteMark($isWhiteMark)
    {
        $this->isWhiteMark = $isWhiteMark;

        return $this;
    }

    /**
     * Get isWhiteMark
     *
     * @return bool
     */
    public function getIsWhiteMark()
    {
        return $this->isWhiteMark;
    }

    /**
     * Set customerFirstname
     *
     * @param string $customerFirstname
     *
     * @return Orders
     */
    public function setCustomerFirstname($customerFirstname)
    {
        $this->customerFirstname = $customerFirstname;

        return $this;
    }

    /**
     * Get customerFirstname
     *
     * @return string
     */
    public function getCustomerFirstname()
    {
        return $this->customerFirstname;
    }

    /**
     * Set customerLastname
     *
     * @param string $customerLastname
     *
     * @return Orders
     */
    public function setCustomerLastname($customerLastname)
    {
        $this->customerLastname = $customerLastname;

        return $this;
    }

    /**
     * Get customerLastname
     *
     * @return string
     */
    public function getCustomerLastname()
    {
        return $this->customerLastname;
    }

    /**
     * Set customerEmail
     *
     * @param string $customerEmail
     *
     * @return Orders
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    /**
     * Get customerEmail
     *
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * Set customerPhone
     *
     * @param string $customerPhone
     *
     * @return Orders
     */
    public function setCustomerPhone($customerPhone)
    {
        $this->customerPhone = $customerPhone;

        return $this;
    }

    /**
     * Get customerPhone
     *
     * @return string
     */
    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }

    /**
     * Set customerPhoneMobile
     *
     * @param string $customerPhoneMobile
     *
     * @return Orders
     */
    public function setCustomerPhoneMobile($customerPhoneMobile)
    {
        $this->customerPhoneMobile = $customerPhoneMobile;

        return $this;
    }

    /**
     * Get customerPhoneMobile
     *
     * @return string
     */
    public function getCustomerPhoneMobile()
    {
        return $this->customerPhoneMobile;
    }

    /**
     * Set orderRef
     *
     * @param string $orderRef
     *
     * @return Orders
     */
    public function setOrderRef($orderRef)
    {
        $this->orderRef = $orderRef;

        return $this;
    }

    /**
     * Get orderRef
     *
     * @return string
     */
    public function getOrderRef()
    {
        return $this->orderRef;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Orders
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Orders
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
     * @return Orders
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
     * Set product
     *
     * @param \Dropshippers\APIBundle\Entity\LocalPsProduct $product
     *
     * @return Orders
     */
    public function setProduct(\Dropshippers\APIBundle\Entity\LocalPsProduct $product)
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
}
