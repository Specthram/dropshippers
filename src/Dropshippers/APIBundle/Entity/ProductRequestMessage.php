<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dropshippers\APIBundle\Entity\ProductRequest;

/**
 * ProductRequestMessage
 *
 * @ORM\Table(name="product_request_message")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ProductRequestMessageRepository")
 */
class ProductRequestMessage
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
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="ProductRequest", inversedBy="messages")
     * @ORM\JoinColumn(name="product_request_id", referencedColumnName="id")
     */
    private $productRequest;

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
     *
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id")
     *
     */
    private $author;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ProductRequestMessage
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
     * @return ProductRequestMessage
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
     * Set message
     *
     * @param string $message
     *
     * @return ProductRequestMessage
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return ProductRequestMessage
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return ProductRequestMessage
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
     * Set productRequest
     *
     * @param \Dropshippers\APIBundle\Entity\ProductRequest $productRequest
     *
     * @return ProductRequestMessage
     */
    public function setProductRequest(\Dropshippers\APIBundle\Entity\ProductRequest $productRequest = null)
    {
        $this->productRequest = $productRequest;

        return $this;
    }

    /**
     * Get productRequest
     *
     * @return \Dropshippers\APIBundle\Entity\ProductRequest
     */
    public function getProductRequest()
    {
        return $this->productRequest;
    }

    /**
     * Set isSendDirectly
     *
     * @param boolean $isSendDirectly
     *
     * @return ProductRequestMessage
     */
    public function setIsSendDirectly($isSendDirectly)
    {
        $this->isSendDirectly = $isSendDirectly;

        return $this;
    }

    /**
     * Get isSendDirectly
     *
     * @return boolean
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
     * @return ProductRequestMessage
     */
    public function setIsWhiteMark($isWhiteMark)
    {
        $this->isWhiteMark = $isWhiteMark;

        return $this;
    }

    /**
     * Get isWhiteMark
     *
     * @return boolean
     */
    public function getIsWhiteMark()
    {
        return $this->isWhiteMark;
    }

    /**
     * Set author
     *
     * @param \Dropshippers\APIBundle\Entity\Shop $author
     *
     * @return ProductRequestMessage
     */
    public function setAuthor(\Dropshippers\APIBundle\Entity\Shop $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Dropshippers\APIBundle\Entity\Shop
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
