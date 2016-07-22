<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_local_ps_product
 *
 * @ORM\Table(name="ds_local_ps_product")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_local_ps_productRepository")
 */
class ds_local_ps_product
{
//    /**
//     * @ORM\ManyToMany(targetEntity="Dropshippers\APIBundle\Entity\ds_local_product_tag")
//     */
//    private $localProductTag;

//    /**
//     * @ORM\ManyToMany(targetEntity="Dropshippers\APIBundle\Entity\ds_local_product_category")
//     */
//    private $localProductCategory;

//    /**
//     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\ds_local_manufacturer")
//     */
//    private $localProductManufacturer;

//    /**
//     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\ds_local_ps_tax_group")
//     */
//    private $localTaxGroup;

//    /**
//     * @ORM\OneToOne(targetEntity="ds_shop")
//     * @ORM\JoinColumn(nullable=false, name="shop_id", referencedColumnName="shop_id")
//     */
//    private $shop_id;
    
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productLocalDescription
     *
     * @param string $productLocalDescription
     *
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
     */
    public function setProductLocalActive($productLocalActive)
    {
        $this->productLocalActive = $productLocalActive;

        return $this;
    }

    /**
     * Get productLocalActive
     *
     * @return bool
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
     */
    public function setProductLocalQuantity($productLocalQuantity)
    {
        $this->productLocalQuantity = $productLocalQuantity;

        return $this;
    }

    /**
     * Get productLocalQuantity
     *
     * @return int
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
     */
    public function setProductLocalAvailableOrder($productLocalAvailableOrder)
    {
        $this->productLocalAvailableOrder = $productLocalAvailableOrder;

        return $this;
    }

    /**
     * Get productLocalAvailableOrder
     *
     * @return bool
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
     * @return ds_local_ps_product
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
     * @return ds_local_ps_product
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
     * Constructor
     */
    public function __construct()
    {
        $this->localProductTag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add localProductTag
     *
     * @param \Dropshippers\APIBundle\Entity\ds_local_product_tag $localProductTag
     *
     * @return ds_local_ps_product
     */
    public function addLocalProductTag(\Dropshippers\APIBundle\Entity\ds_local_product_tag $localProductTag)
    {
        $this->localProductTag[] = $localProductTag;

        return $this;
    }

    /**
     * Remove localProductTag
     *
     * @param \Dropshippers\APIBundle\Entity\ds_local_product_tag $localProductTag
     */
    public function removeLocalProductTag(\Dropshippers\APIBundle\Entity\ds_local_product_tag $localProductTag)
    {
        $this->localProductTag->removeElement($localProductTag);
    }

    /**
     * Get localProductTag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocalProductTag()
    {
        return $this->localProductTag;
    }

    /**
     * Add localProductCategory
     *
     * @param \Dropshippers\APIBundle\Entity\ds_local_product_category $localProductCategory
     *
     * @return ds_local_ps_product
     */
    public function addLocalProductCategory(ds_local_product_category $localProductCategory)
    {
        $this->localProductCategory[] = $localProductCategory;

        return $this;
    }

    /**
     * Remove localProductCategory
     *
     * @param \Dropshippers\APIBundle\Entity\ds_local_product_category $localProductCategory
     */
    public function removeLocalProductCategory(ds_local_product_category $localProductCategory)
    {
        $this->localProductCategory->removeElement($localProductCategory);
    }

    /**
     * Get localProductCategory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocalProductCategory()
    {
        return $this->localProductCategory;
    }

    /**
     * Set localProductManufacturer
     *
     * @param ds_local_manufacturer $localProductManufacturer
     *
     * @return ds_local_ps_product
     */
    public function setLocalProductManufacturer(ds_local_manufacturer $localProductManufacturer = null)
    {
        $this->localProductManufacturer = $localProductManufacturer;

        return $this;
    }

    /**
     * Get localProductManufacturer
     *
     * @return ds_local_manufacturer
     */
    public function getLocalProductManufacturer()
    {
        return $this->localProductManufacturer;
    }




    /**
     * Set productLocalProductid
     *
     * @param integer $productLocalProductid
     *
     * @return ds_local_ps_product
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
     * Set localTaxGroup
     *
     * @param \Dropshippers\APIBundle\Entity\ds_local_ps_tax_group $localTaxGroup
     *
     * @return ds_local_ps_product
     */
    public function setLocalTaxGroup(\Dropshippers\APIBundle\Entity\ds_local_ps_tax_group $localTaxGroup = null)
    {
        $this->localTaxGroup = $localTaxGroup;

        return $this;
    }

    /**
     * Get localTaxGroup
     *
     * @return \Dropshippers\APIBundle\Entity\ds_local_ps_tax_group
     */
    public function getLocalTaxGroup()
    {
        return $this->localTaxGroup;
    }

    /**
     * Set shopId
     *
     * @param \Dropshippers\APIBundle\Entity\ds_shop $shopId
     *
     * @return ds_local_ps_product
     */
    public function setShopId(\Dropshippers\APIBundle\Entity\ds_shop $shopId)
    {
        $this->shop_id = $shopId;

        return $this;
    }

    /**
     * Get shopId
     *
     * @return \Dropshippers\APIBundle\Entity\ds_shop
     */
    public function getShopId()
    {
        return $this->shop_id;
    }
}
