<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_product_image
 *
 * @ORM\Table(name="ds_product_image")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_product_imageRepository")
 */
class ds_product_image
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
     * @ORM\Column(name="product_image_type", type="string", length=255)
     */
    private $productImageType;

    /**
     * @var string
     *
     * @ORM\Column(name="product_image_path", type="text", nullable=true)
     */
    private $productImagePath;

    /**
     * @var string
     *
     * @ORM\Column(name="product_image_link", type="text", nullable=true)
     */
    private $productImageLink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_image_created_at", type="datetimetz")
     */
    private $productImageCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_image_updated_at", type="datetimetz")
     */
    private $productImageUpdatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\ds_product")
     */
    private $productImage;


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
     * Set productImageType
     *
     * @param string $productImageType
     *
     * @return ds_product_image
     */
    public function setProductImageType($productImageType)
    {
        $this->productImageType = $productImageType;

        return $this;
    }

    /**
     * Get productImageType
     *
     * @return string
     */
    public function getProductImageType()
    {
        return $this->productImageType;
    }

    /**
     * Set productImagePath
     *
     * @param string $productImagePath
     *
     * @return ds_product_image
     */
    public function setProductImagePath($productImagePath)
    {
        $this->productImagePath = $productImagePath;

        return $this;
    }

    /**
     * Get productImagePath
     *
     * @return string
     */
    public function getProductImagePath()
    {
        return $this->productImagePath;
    }

    /**
     * Set productImageLink
     *
     * @param string $productImageLink
     *
     * @return ds_product_image
     */
    public function setProductImageLink($productImageLink)
    {
        $this->productImageLink = $productImageLink;

        return $this;
    }

    /**
     * Get productImageLink
     *
     * @return string
     */
    public function getProductImageLink()
    {
        return $this->productImageLink;
    }

    /**
     * Set productImageCreatedAt
     *
     * @param \DateTime $productImageCreatedAt
     *
     * @return ds_product_image
     */
    public function setProductImageCreatedAt($productImageCreatedAt)
    {
        $this->productImageCreatedAt = $productImageCreatedAt;

        return $this;
    }

    /**
     * Get productImageCreatedAt
     *
     * @return \DateTime
     */
    public function getProductImageCreatedAt()
    {
        return $this->productImageCreatedAt;
    }

    /**
     * Set productImageUpdatedAt
     *
     * @param \DateTime $productImageUpdatedAt
     *
     * @return ds_product_image
     */
    public function setProductImageUpdatedAt($productImageUpdatedAt)
    {
        $this->productImageUpdatedAt = $productImageUpdatedAt;

        return $this;
    }

    /**
     * Get productImageUpdatedAt
     *
     * @return \DateTime
     */
    public function getProductImageUpdatedAt()
    {
        return $this->productImageUpdatedAt;
    }

    /**
     * Set productImage
     *
     * @param \Dropshippers\APIBundle\Entity\ds_product $productImage
     *
     * @return ds_product_image
     */
    public function setProductImage(\Dropshippers\APIBundle\Entity\ds_product $productImage = null)
    {
        $this->productImage = $productImage;

        return $this;
    }

    /**
     * Get productImage
     *
     * @return \Dropshippers\APIBundle\Entity\ds_product
     */
    public function getProductImage()
    {
        return $this->productImage;
    }
}
