<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocalPsProduct
 *
 * @ORM\Table(name="ds_local_ps_product")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\LocalPsProductRepository")
 */
class LocalPsProduct
{
    /**
     * @ORM\ManyToMany(targetEntity="ProductTag")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity="ProductCategory")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity="Shop")
     */
    private $shop;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="product_local_product_id", type="integer")
     */
    private $productLocalProductid;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_description", type="text", nullable=true)
     */
    private $productLocalDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_name", type="string", length=255)
     */
    private $productLocalName;

    /**
     * @var bool
     *
     * @ORM\Column(name="product_local_active", type="boolean")
     */
    private $productLocalActive;

    /**
     * @var float
     *
     * @ORM\Column(name="product_local_price", type="float", nullable=true)
     */
    private $productLocalPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_categories", type="text", nullable=true)
     */
    private $productLocalCategories;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_tax", type="string", length=255, nullable=true)
     */
    private $productLocalTax;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_reference", type="string", length=255, nullable=true)
     */
    private $productLocalReference;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_supplier_reference", type="string", length=255, nullable=true)
     */
    private $productLocalSupplierReference;

    /**
     * @var float
     *
     * @ORM\Column(name="product_local_ecotax", type="float", nullable=true)
     */
    private $productLocalEcotax;

    /**
     * @var float
     *
     * @ORM\Column(name="product_local_weight", type="float", nullable=true)
     */
    private $productLocalWeight;

    /**
     * @var int
     *
     * @ORM\Column(name="product_local_quantity", type="integer", nullable=true)
     */
    private $productLocalQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_description_html", type="text", nullable=true)
     */
    private $productLocalDescriptionHtml;

    /**
     * @var bool
     *
     * @ORM\Column(name="product_local_available_order", type="boolean", nullable=true)
     */
    private $productLocalAvailableOrder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_created_at", type="datetimetz")
     */
    private $productLocalCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_updated_at", type="datetimetz")
     */
    private $productLocalUpdatedAt;

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
     * Set productLocalProductid
     *
     * @param integer $productLocalProductid
     *
     * @return LocalPsProduct
     */
    public function setProductLocalProductid($productLocalProductid)
    {
        $this->productLocalProductid = $productLocalProductid;

        return $this;
    }

    /**
     * Get productLocalProductid
     *
     * @return integer
     */
    public function getProductLocalProductid()
    {
        return $this->productLocalProductid;
    }

    /**
     * Set productLocalDescription
     *
     * @param string $productLocalDescription
     *
     * @return LocalPsProduct
     */
    public function setProductLocalDescription($productLocalDescription)
    {
        $this->productLocalDescription = $productLocalDescription;

        return $this;
    }

    /**
     * Get productLocalDescription
     *
     * @return string
     */
    public function getProductLocalDescription()
    {
        return $this->productLocalDescription;
    }

    /**
     * Set productLocalName
     *
     * @param string $productLocalName
     *
     * @return LocalPsProduct
     */
    public function setProductLocalName($productLocalName)
    {
        $this->productLocalName = $productLocalName;

        return $this;
    }

    /**
     * Get productLocalName
     *
     * @return string
     */
    public function getProductLocalName()
    {
        return $this->productLocalName;
    }

    /**
     * Set productLocalActive
     *
     * @param boolean $productLocalActive
     *
     * @return LocalPsProduct
     */
    public function setProductLocalActive($productLocalActive)
    {
        $this->productLocalActive = $productLocalActive;

        return $this;
    }

    /**
     * Get productLocalActive
     *
     * @return boolean
     */
    public function getProductLocalActive()
    {
        return $this->productLocalActive;
    }

    /**
     * Set productLocalPrice
     *
     * @param float $productLocalPrice
     *
     * @return LocalPsProduct
     */
    public function setProductLocalPrice($productLocalPrice)
    {
        $this->productLocalPrice = $productLocalPrice;

        return $this;
    }

    /**
     * Get productLocalPrice
     *
     * @return float
     */
    public function getProductLocalPrice()
    {
        return $this->productLocalPrice;
    }

    /**
     * Set productLocalCategories
     *
     * @param string $productLocalCategories
     *
     * @return LocalPsProduct
     */
    public function setProductLocalCategories($productLocalCategories)
    {
        $this->productLocalCategories = $productLocalCategories;

        return $this;
    }

    /**
     * Get productLocalCategories
     *
     * @return string
     */
    public function getProductLocalCategories()
    {
        return $this->productLocalCategories;
    }

    /**
     * Set productLocalTax
     *
     * @param string $productLocalTax
     *
     * @return LocalPsProduct
     */
    public function setProductLocalTax($productLocalTax)
    {
        $this->productLocalTax = $productLocalTax;

        return $this;
    }

    /**
     * Get productLocalTax
     *
     * @return string
     */
    public function getProductLocalTax()
    {
        return $this->productLocalTax;
    }

    /**
     * Set productLocalReference
     *
     * @param string $productLocalReference
     *
     * @return LocalPsProduct
     */
    public function setProductLocalReference($productLocalReference)
    {
        $this->productLocalReference = $productLocalReference;

        return $this;
    }

    /**
     * Get productLocalReference
     *
     * @return string
     */
    public function getProductLocalReference()
    {
        return $this->productLocalReference;
    }

    /**
     * Set productLocalSupplierReference
     *
     * @param string $productLocalSupplierReference
     *
     * @return LocalPsProduct
     */
    public function setProductLocalSupplierReference($productLocalSupplierReference)
    {
        $this->productLocalSupplierReference = $productLocalSupplierReference;

        return $this;
    }

    /**
     * Get productLocalSupplierReference
     *
     * @return string
     */
    public function getProductLocalSupplierReference()
    {
        return $this->productLocalSupplierReference;
    }

    /**
     * Set productLocalEcotax
     *
     * @param float $productLocalEcotax
     *
     * @return LocalPsProduct
     */
    public function setProductLocalEcotax($productLocalEcotax)
    {
        $this->productLocalEcotax = $productLocalEcotax;

        return $this;
    }

    /**
     * Get productLocalEcotax
     *
     * @return float
     */
    public function getProductLocalEcotax()
    {
        return $this->productLocalEcotax;
    }

    /**
     * Set productLocalWeight
     *
     * @param float $productLocalWeight
     *
     * @return LocalPsProduct
     */
    public function setProductLocalWeight($productLocalWeight)
    {
        $this->productLocalWeight = $productLocalWeight;

        return $this;
    }

    /**
     * Get productLocalWeight
     *
     * @return float
     */
    public function getProductLocalWeight()
    {
        return $this->productLocalWeight;
    }

    /**
     * Set productLocalQuantity
     *
     * @param integer $productLocalQuantity
     *
     * @return LocalPsProduct
     */
    public function setProductLocalQuantity($productLocalQuantity)
    {
        $this->productLocalQuantity = $productLocalQuantity;

        return $this;
    }

    /**
     * Get productLocalQuantity
     *
     * @return integer
     */
    public function getProductLocalQuantity()
    {
        return $this->productLocalQuantity;
    }

    /**
     * Set productLocalDescriptionHtml
     *
     * @param string $productLocalDescriptionHtml
     *
     * @return LocalPsProduct
     */
    public function setProductLocalDescriptionHtml($productLocalDescriptionHtml)
    {
        $this->productLocalDescriptionHtml = $productLocalDescriptionHtml;

        return $this;
    }

    /**
     * Get productLocalDescriptionHtml
     *
     * @return string
     */
    public function getProductLocalDescriptionHtml()
    {
        return $this->productLocalDescriptionHtml;
    }

    /**
     * Set productLocalAvailableOrder
     *
     * @param boolean $productLocalAvailableOrder
     *
     * @return LocalPsProduct
     */
    public function setProductLocalAvailableOrder($productLocalAvailableOrder)
    {
        $this->productLocalAvailableOrder = $productLocalAvailableOrder;

        return $this;
    }

    /**
     * Get productLocalAvailableOrder
     *
     * @return boolean
     */
    public function getProductLocalAvailableOrder()
    {
        return $this->productLocalAvailableOrder;
    }

    /**
     * Set productLocalCreatedAt
     *
     * @param \DateTime $productLocalCreatedAt
     *
     * @return LocalPsProduct
     */
    public function setProductLocalCreatedAt($productLocalCreatedAt)
    {
        $this->productLocalCreatedAt = $productLocalCreatedAt;

        return $this;
    }

    /**
     * Get productLocalCreatedAt
     *
     * @return \DateTime
     */
    public function getProductLocalCreatedAt()
    {
        return $this->productLocalCreatedAt;
    }

    /**
     * Set productLocalUpdatedAt
     *
     * @param \DateTime $productLocalUpdatedAt
     *
     * @return LocalPsProduct
     */
    public function setProductLocalUpdatedAt($productLocalUpdatedAt)
    {
        $this->productLocalUpdatedAt = $productLocalUpdatedAt;

        return $this;
    }

    /**
     * Get productLocalUpdatedAt
     *
     * @return \DateTime
     */
    public function getProductLocalUpdatedAt()
    {
        return $this->productLocalUpdatedAt;
    }

    /**
     * Set shop
     *
     * @param \Dropshippers\APIBundle\Entity\Shop $shop
     *
     * @return LocalPsProduct
     */
    public function setShop(Shop $shop = null)
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

    /**
     * Add tag
     *
     * @param \Dropshippers\APIBundle\Entity\ProductTag $tag
     *
     * @return LocalPsProduct
     */
    public function addTag(\Dropshippers\APIBundle\Entity\ProductTag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Dropshippers\APIBundle\Entity\ProductTag $tag
     */
    public function removeTag(\Dropshippers\APIBundle\Entity\ProductTag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add category
     *
     * @param \Dropshippers\APIBundle\Entity\ProductCategory $category
     *
     * @return LocalPsProduct
     */
    public function addCategory(\Dropshippers\APIBundle\Entity\ProductCategory $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Dropshippers\APIBundle\Entity\ProductCategory $category
     */
    public function removeCategory(\Dropshippers\APIBundle\Entity\ProductCategory $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
