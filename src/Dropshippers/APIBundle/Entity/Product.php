<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="ds_product")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\ManyToMany(targetEntity="ProductTag")
     */
    private $tag;

    /**
     * @ORM\ManyToMany(targetEntity="ProductCategory")
     */
    private $category;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productTag = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productCategory = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="product_active", type="boolean")
     */
    private $active;

    /**
     * @var float
     *
     * @ORM\Column(name="product_price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="product_tax", type="string", length=255, nullable=true)
     */
    private $tax;

    /**
     * @var string
     *
     * @ORM\Column(name="product_supplier_reference", type="string", length=255)
     */
    private $supplierReference;

    /**
     * @var string
     *
     * @ORM\Column(name="product_ecotax", type="string", length=255, nullable=true)
     */
    private $ecotax;

    /**
     * @var float
     *
     * @ORM\Column(name="product_weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="product_quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="product_description_html", type="text", nullable=true)
     */
    private $descriptionHtml;

    /**
     * @var bool
     *
     * @ORM\Column(name="product_available_order", type="boolean")
     */
    private $availableOrder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_created_at", type="datetimetz")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_updated_at", type="datetimetz")
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
     * Set description
     *
     * @param string $description
     *
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Set supplierReference
     *
     * @param string $supplierReference
     *
     * @return Product
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
     * @param string $ecotax
     *
     * @return Product
     */
    public function setEcotax($ecotax)
    {
        $this->ecotax = $ecotax;

        return $this;
    }

    /**
     * Get ecotax
     *
     * @return string
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @param \Dropshippers\APIBundle\Entity\ProductTag $tag
     *
     * @return Product
     */
    public function addTag(\Dropshippers\APIBundle\Entity\ProductTag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Dropshippers\APIBundle\Entity\ProductTag $tag
     */
    public function removeTag(\Dropshippers\APIBundle\Entity\ProductTag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add category
     *
     * @param \Dropshippers\APIBundle\Entity\ProductCategory $category
     *
     * @return Product
     */
    public function addCategory(\Dropshippers\APIBundle\Entity\ProductCategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Dropshippers\APIBundle\Entity\ProductCategory $category
     */
    public function removeCategory(\Dropshippers\APIBundle\Entity\ProductCategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
}
