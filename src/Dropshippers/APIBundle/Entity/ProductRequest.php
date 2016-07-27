<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductRequest
 *
 * @ORM\Table(name="ds_product_request")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ProductRequestRepository")
 */
class ProductRequest
{
    /**
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * @return mixed
     */
    public function getProducts()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProducts(LocalPsProduct $product)
    {
        $this->product = $product;
    }
}
