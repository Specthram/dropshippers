<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_product
 *
 * @ORM\Table(name="ds_product")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_productRepository")
 */
class ds_product
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
     *
     * @ORM\Column(name="product_description", type="text")
     */
    private $productDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $productName;

    /**
     * @var bool
     *
     * @ORM\Column(name="product_active", type="boolean")
     */
    private $productActive;

    /**
     * @var float
     *
     * @ORM\Column(name="product_price", type="float")
     */
    private $productPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="product_tax", type="string", length=255, nullable=true)
     */
    private $productTax;

    /**
     * @var string
     *
     * @ORM\Column(name="product_supplier_reference", type="string", length=255)
     */
    private $productSupplierReference;

    /**
     * @var string
     *
     * @ORM\Column(name="product_ecotax", type="string", length=255, nullable=true)
     */
    private $productEcotax;

    /**
     * @var float
     *
     * @ORM\Column(name="product_weight", type="float", nullable=true)
     */
    private $productWeight;

    /**
     * @var int
     *
     * @ORM\Column(name="product_quantity", type="integer", nullable=true)
     */
    private $productQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="product_description_html", type="text", nullable=true)
     */
    private $productDescriptionHtml;

    /**
     * @var bool
     *
     * @ORM\Column(name="product_available_order", type="boolean")
     */
    private $productAvailableOrder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_created_at", type="datetimetz")
     */
    private $productCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_updated_at", type="datetimetz")
     */
    private $productUpdatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="ds_product_tag")
     */
    private $productTag;

    /**
     * @ORM\ManyToMany(targetEntity="ds_product_category")
     */
    private $productCategory;

    /**
     * @ORM\ManyToOne(targetEntity="ds_product")
     */
    private $shop;


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
     * Set productDescription
     *
     * @param string $productDescription
     *
     * @return ds_product
     */
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    /**
     * Get productDescription
     *
     * @return string
     */
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return ds_product
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set productActive
     *
     * @param boolean $productActive
     *
     * @return ds_product
     */
    public function setProductActive($productActive)
    {
        $this->productActive = $productActive;

        return $this;
    }

    /**
     * Get productActive
     *
     * @return bool
     */
    public function getProductActive()
    {
        return $this->productActive;
    }

    /**
     * Set productPrice
     *
     * @param float $productPrice
     *
     * @return ds_product
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    /**
     * Get productPrice
     *
     * @return float
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * Set productTax
     *
     * @param string $productTax
     *
     * @return ds_product
     */
    public function setProductTax($productTax)
    {
        $this->productTax = $productTax;

        return $this;
    }

    /**
     * Get productTax
     *
     * @return string
     */
    public function getProductTax()
    {
        return $this->productTax;
    }

    /**
     * Set productSupplierReference
     *
     * @param string $productSupplierReference
     *
     * @return ds_product
     */
    public function setProductSupplierReference($productSupplierReference)
    {
        $this->productSupplierReference = $productSupplierReference;

        return $this;
    }

    /**
     * Get productSupplierReference
     *
     * @return string
     */
    public function getProductSupplierReference()
    {
        return $this->productSupplierReference;
    }

    /**
     * Set productEcotax
     *
     * @param string $productEcotax
     *
     * @return ds_product
     */
    public function setProductEcotax($productEcotax)
    {
        $this->productEcotax = $productEcotax;

        return $this;
    }

    /**
     * Get productEcotax
     *
     * @return string
     */
    public function getProductEcotax()
    {
        return $this->productEcotax;
    }

    /**
     * Set productWeight
     *
     * @param float $productWeight
     *
     * @return ds_product
     */
    public function setProductWeight($productWeight)
    {
        $this->productWeight = $productWeight;

        return $this;
    }

    /**
     * Get productWeight
     *
     * @return float
     */
    public function getProductWeight()
    {
        return $this->productWeight;
    }

    /**
     * Set productQuantity
     *
     * @param integer $productQuantity
     *
     * @return ds_product
     */
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;

        return $this;
    }

    /**
     * Get productQuantity
     *
     * @return int
     */
    public function getProductQuantity()
    {
        return $this->productQuantity;
    }

    /**
     * Set productDescriptionHtml
     *
     * @param string $productDescriptionHtml
     *
     * @return ds_product
     */
    public function setProductDescriptionHtml($productDescriptionHtml)
    {
        $this->productDescriptionHtml = $productDescriptionHtml;

        return $this;
    }

    /**
     * Get productDescriptionHtml
     *
     * @return string
     */
    public function getProductDescriptionHtml()
    {
        return $this->productDescriptionHtml;
    }

    /**
     * Set productAvailableOrder
     *
     * @param boolean $productAvailableOrder
     *
     * @return ds_product
     */
    public function setProductAvailableOrder($productAvailableOrder)
    {
        $this->productAvailableOrder = $productAvailableOrder;

        return $this;
    }

    /**
     * Get productAvailableOrder
     *
     * @return bool
     */
    public function getProductAvailableOrder()
    {
        return $this->productAvailableOrder;
    }

    /**
     * Set productCreatedAt
     *
     * @param \DateTime $productCreatedAt
     *
     * @return ds_product
     */
    public function setProductCreatedAt($productCreatedAt)
    {
        $this->productCreatedAt = $productCreatedAt;

        return $this;
    }

    /**
     * Get productCreatedAt
     *
     * @return \DateTime
     */
    public function getProductCreatedAt()
    {
        return $this->productCreatedAt;
    }

    /**
     * Set productUpdatedAt
     *
     * @param \DateTime $productUpdatedAt
     *
     * @return ds_product
     */
    public function setProductUpdatedAt($productUpdatedAt)
    {
        $this->productUpdatedAt = $productUpdatedAt;

        return $this;
    }

    /**
     * Get productUpdatedAt
     *
     * @return \DateTime
     */
    public function getProductUpdatedAt()
    {
        return $this->productUpdatedAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productTag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add productTag
     *
     * @param \Dropshippers\APIBundle\Entity\ds_product_tag $productTag
     *
     * @return ds_product
     */
    public function addProductTag(ds_product_tag $productTag)
    {
        $this->productTag[] = $productTag;

        return $this;
    }

    /**
     * Remove productTag
     *
     * @param \Dropshippers\APIBundle\Entity\ds_product_tag $productTag
     */
    public function removeProductTag(ds_product_tag $productTag)
    {
        $this->productTag->removeElement($productTag);
    }

    /**
     * Get productTag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTag()
    {
        return $this->productTag;
    }

    /**
     * Add productCategory
     *
     * @param \Dropshippers\APIBundle\Entity\ds_product_category $productCategory
     *
     * @return ds_product
     */
    public function addProductCategory(ds_product_category $productCategory)
    {
        $this->productCategory[] = $productCategory;

        return $this;
    }

    /**
     * Remove productCategory
     *
     * @param \Dropshippers\APIBundle\Entity\ds_product_category $productCategory
     */
    public function removeProductCategory(ds_product_category $productCategory)
    {
        $this->productCategory->removeElement($productCategory);
    }

    /**
     * Get productCategory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * Set shop
     *
     * @param \Dropshippers\APIBundle\Entity\ds_product $shop
     *
     * @return ds_product
     */
    public function setShop(ds_product $shop = null)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return \Dropshippers\APIBundle\Entity\ds_product
     */
    public function getShop()
    {
        return $this->shop;
    }
}
