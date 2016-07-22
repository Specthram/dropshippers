<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_product_category
 *
 * @ORM\Table(name="ds_product_category")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_product_categoryRepository")
 */
class ds_product_category
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
     * @ORM\Column(name="product_category_name", type="string", length=255)
     */
    private $productCategoryName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_category_created_at", type="datetimetz")
     */
    private $productCategoryCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_category_updated_at", type="datetimetz")
     */
    private $productCategoryUpdatedAt;


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
     * Set productCategoryName
     *
     * @param string $productCategoryName
     *
     * @return ds_product_category
     */
    public function setProductCategoryName($productCategoryName)
    {
        $this->productCategoryName = $productCategoryName;

        return $this;
    }

    /**
     * Get productCategoryName
     *
     * @return string
     */
    public function getProductCategoryName()
    {
        return $this->productCategoryName;
    }

    /**
     * Set productCategoryCreatedAt
     *
     * @param \DateTime $productCategoryCreatedAt
     *
     * @return ds_product_category
     */
    public function setProductCategoryCreatedAt($productCategoryCreatedAt)
    {
        $this->productCategoryCreatedAt = $productCategoryCreatedAt;

        return $this;
    }

    /**
     * Get productCategoryCreatedAt
     *
     * @return \DateTime
     */
    public function getProductCategoryCreatedAt()
    {
        return $this->productCategoryCreatedAt;
    }

    /**
     * Set productCategoryUpdatedAt
     *
     * @param \DateTime $productCategoryUpdatedAt
     *
     * @return ds_product_category
     */
    public function setProductCategoryUpdatedAt($productCategoryUpdatedAt)
    {
        $this->productCategoryUpdatedAt = $productCategoryUpdatedAt;

        return $this;
    }

    /**
     * Get productCategoryUpdatedAt
     *
     * @return \DateTime
     */
    public function getProductCategoryUpdatedAt()
    {
        return $this->productCategoryUpdatedAt;
    }
}
