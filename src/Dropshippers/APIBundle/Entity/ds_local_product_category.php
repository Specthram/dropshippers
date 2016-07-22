<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_local_product_category
 *
 * @ORM\Table(name="ds_local_product_category")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_local_product_categoryRepository")
 */
class ds_local_product_category
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_category_name", type="string", length=255)
     */
    private $productLocalCategoryName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_category_created_at", type="datetimetz")
     */
    private $productLocalCategoryCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_category_updated_at", type="datetimetz")
     */
    private $productLocalCategoryUpdatedAt;


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
     * Set productLocalCategoryName
     *
     * @param string $productLocalCategoryName
     *
     * @return ds_local_product_category
     */
    public function setProductLocalCategoryName($productLocalCategoryName)
    {
        $this->productLocalCategoryName = $productLocalCategoryName;

        return $this;
    }

    /**
     * Get productLocalCategoryName
     *
     * @return string
     */
    public function getProductLocalCategoryName()
    {
        return $this->productLocalCategoryName;
    }

    /**
     * Set productLocalCategoryCreatedAt
     *
     * @param \DateTime $productLocalCategoryCreatedAt
     *
     * @return ds_local_product_category
     */
    public function setProductLocalCategoryCreatedAt($productLocalCategoryCreatedAt)
    {
        $this->productLocalCategoryCreatedAt = $productLocalCategoryCreatedAt;

        return $this;
    }

    /**
     * Get productLocalCategoryCreatedAt
     *
     * @return \DateTime
     */
    public function getProductLocalCategoryCreatedAt()
    {
        return $this->productLocalCategoryCreatedAt;
    }

    /**
     * Set productLocalCategoryUpdatedAt
     *
     * @param \DateTime $productLocalCategoryUpdatedAt
     *
     * @return ds_local_product_category
     */
    public function setProductLocalCategoryUpdatedAt($productLocalCategoryUpdatedAt)
    {
        $this->productLocalCategoryUpdatedAt = $productLocalCategoryUpdatedAt;

        return $this;
    }

    /**
     * Get productLocalCategoryUpdatedAt
     *
     * @return \DateTime
     */
    public function getProductLocalCategoryUpdatedAt()
    {
        return $this->productLocalCategoryUpdatedAt;
    }
}
