<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Dropshippers\APIBundle\Entity\Shop;

/**
 * LocalPsProduct
 *
 * @ORM\Table(name="ds_local_ps_product")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\LocalPsProductRepository")
 */
class LocalPsProduct
{
    /**
     * @ORM\ManyToMany(targetEntity="LocalProductTag")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity="Category", cascade={"remove", "persist"})
     * @ORM\JoinTable(name="local_ps_product_category",
     *     joinColumns={@ORM\JoinColumn(name="local_ps_product_id", referencedColumnName="id", onDelete="cascade")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="cascade")}
     *     )
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="LocalProductImage", mappedBy="localProduct", cascade={"persist"})
     */
    private $images;

    /**
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id", nullable=false)
     */
    private $shop;

    /**
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumn(name="shop_origin_id", referencedColumnName="id", nullable=false)
     */
    private $shopOrigin;

	/**
	 * @ORM\ManyToOne(targetEntity="LocalPsProduct")
	 * @ORM\JoinColumn(name="product_origin_id", referencedColumnName="id", nullable=true)
	 */
	private $productOrigin;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->images = new ArrayCollection();
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
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="product_local_active", type="boolean")
     */
    private $active;

    /**
     * @var float
     *
     * @ORM\Column(name="product_local_price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_tax", type="string", length=255, nullable=true)
     */
    private $tax;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_supplier_reference", type="string", length=255, nullable=true)
     */
    private $supplierReference;

    /**
     * @var float
     *
     * @ORM\Column(name="product_local_ecotax", type="float", nullable=true)
     */
    private $ecotax;

    /**
     * @var float
     *
     * @ORM\Column(name="product_local_weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="product_local_quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_description_html", type="text", nullable=true)
     */
    private $descriptionHtml;

    /**
     * @var bool
     *
     * @ORM\Column(name="product_local_available_order", type="boolean", nullable=true)
     */
    private $availableOrder;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_dropshippers_ref", type="string", length=255, nullable=true)
     */
    private $dropshippersRef;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_created_at", type="datetimetz")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_updated_at", type="datetimetz")
     */
    private $updatedAt;

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
     * Set productId
     *
     * @param integer $productId
     *
     * @return LocalPsProduct
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return LocalPsProduct
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return LocalPsProduct
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
     * Set active
     *
     * @param boolean $active
     *
     * @return LocalPsProduct
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return LocalPsProduct
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
     * Set tax
     *
     * @param string $tax
     *
     * @return LocalPsProduct
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return LocalPsProduct
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set supplierReference
     *
     * @param string $supplierReference
     *
     * @return LocalPsProduct
     */
    public function setSupplierReference($supplierReference)
    {
        $this->supplierReference = $supplierReference;

        return $this;
    }

    /**
     * Get supplierReference
     *
     * @return string
     */
    public function getSupplierReference()
    {
        return $this->supplierReference;
    }

    /**
     * Set ecotax
     *
     * @param float $ecotax
     *
     * @return LocalPsProduct
     */
    public function setEcotax($ecotax)
    {
        $this->ecotax = $ecotax;

        return $this;
    }

    /**
     * Get ecotax
     *
     * @return float
     */
    public function getEcotax()
    {
        return $this->ecotax;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return LocalPsProduct
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return LocalPsProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set descriptionHtml
     *
     * @param string $descriptionHtml
     *
     * @return LocalPsProduct
     */
    public function setDescriptionHtml($descriptionHtml)
    {
        $this->descriptionHtml = $descriptionHtml;

        return $this;
    }

    /**
     * Get descriptionHtml
     *
     * @return string
     */
    public function getDescriptionHtml()
    {
        return $this->descriptionHtml;
    }

    /**
     * Set availableOrder
     *
     * @param boolean $availableOrder
     *
     * @return LocalPsProduct
     */
    public function setAvailableOrder($availableOrder)
    {
        $this->availableOrder = $availableOrder;

        return $this;
    }

    /**
     * Get availableOrder
     *
     * @return boolean
     */
    public function getAvailableOrder()
    {
        return $this->availableOrder;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return LocalPsProduct
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
     * @return LocalPsProduct
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
     * Add tag
     *
     * @param \Dropshippers\APIBundle\Entity\LocalProductTag $tag
     *
     * @return LocalPsProduct
     */
    public function addTag(LocalProductTag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Dropshippers\APIBundle\Entity\LocalProductTag $tag
     */
    public function removeTag(LocalProductTag $tag)
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
     * @param \Dropshippers\APIBundle\Entity\Category $category
     *
     * @return LocalPsProduct
     */
    public function addCategory(Category $category)
    {
//        $this->categories[$category->getId()] = $category;
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Dropshippers\APIBundle\Entity\Category $category
     */
    public function removeCategory(Category $category)
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
     * Set dropshippersRef
     *
     * @param string $dropshippersRef
     *
     * @return LocalPsProduct
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
     * Set shopOrigin
     *
     * @param \Dropshippers\APIBundle\Entity\Shop $shopOrigin
     *
     * @return LocalPsProduct
     */
    public function setShopOrigin(Shop $shopOrigin = null)
    {
        $this->shopOrigin = $shopOrigin;

        return $this;
    }

    /**
     * Get shopOrigin
     *
     * @return \Dropshippers\APIBundle\Entity\Shop
     */
    public function getShopOrigin()
    {
        return $this->shopOrigin;
    }

	/**
	 * Set productOrigin
	 *
	 * @param \Dropshippers\APIBundle\Entity\LocalPsProduct $productOrigin
	 *
	 * @return LocalPsProduct
	 */
	public function setProductOrigin(LocalPsProduct $productOrigin = null)
	{
		$this->productOrigin = $productOrigin;

		return $this;
	}

	/**
	 * Get productOrigin
	 *
	 * @return \Dropshippers\APIBundle\Entity\LocalPsProduct
	 */
	public function getProductOrigin()
	{
		return $this->productOrigin;
	}

    /**
     * Add image
     *
     * @param \Dropshippers\APIBundle\Entity\LocalProductImage $image
     *
     * @return LocalPsProduct
     */
    public function addImage(\Dropshippers\APIBundle\Entity\LocalProductImage $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \Dropshippers\APIBundle\Entity\LocalProductImage $image
     */
    public function removeImage(\Dropshippers\APIBundle\Entity\LocalProductImage $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
}
