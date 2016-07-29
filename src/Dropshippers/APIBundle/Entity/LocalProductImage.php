<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocalProductImage
 *
 * @ORM\Table(name="ds_local_product_image")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\LocalProductImageRepository")
 */
class LocalProductImage
{
    /**
     * @var int
     *
     * @ORM\Column(name="product_local_image_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="LocalPsProduct")
     */
    private $localProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_image_type", type="string", length=255, nullable=true)
     */
    private $productLocalImageType;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_image_path", type="string", length=255, nullable=true)
     */
    private $productLocalImagePath;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_image_link", type="string", length=255, nullable=true)
     */
    private $productLocalImageLink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_image_created_at", type="datetimetz")
     */
    private $productLocalImageCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_image_updated_at", type="datetimetz")
     */
    private $productLocalImageUpdatedAt;

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
     * Set productLocalImageType
     *
     * @param string $productLocalImageType
     *
     * @return LocalProductImage
     */
    public function setProductLocalImageType($productLocalImageType)
    {
        $this->productLocalImageType = $productLocalImageType;

        return $this;
    }

    /**
     * Get productLocalImageType
     *
     * @return string
     */
    public function getProductLocalImageType()
    {
        return $this->productLocalImageType;
    }

    /**
     * Set productLocalImagePath
     *
     * @param string $productLocalImagePath
     *
     * @return LocalProductImage
     */
    public function setProductLocalImagePath($productLocalImagePath)
    {
        $this->productLocalImagePath = $productLocalImagePath;

        return $this;
    }

    /**
     * Get productLocalImagePath
     *
     * @return string
     */
    public function getProductLocalImagePath()
    {
        return $this->productLocalImagePath;
    }

    /**
     * Set productLocalImageLink
     *
     * @param string $productLocalImageLink
     *
     * @return LocalProductImage
     */
    public function setProductLocalImageLink($productLocalImageLink)
    {
        $this->productLocalImageLink = $productLocalImageLink;

        return $this;
    }

    /**
     * Get productLocalImageLink
     *
     * @return string
     */
    public function getProductLocalImageLink()
    {
        return $this->productLocalImageLink;
    }

    /**
     * Set productLocalImageCreatedAt
     *
     * @param \DateTime $productLocalImageCreatedAt
     *
     * @return LocalProductImage
     */
    public function setProductLocalImageCreatedAt($productLocalImageCreatedAt)
    {
        $this->productLocalImageCreatedAt = $productLocalImageCreatedAt;

        return $this;
    }

    /**
     * Get productLocalImageCreatedAt
     *
     * @return \DateTime
     */
    public function getProductLocalImageCreatedAt()
    {
        return $this->productLocalImageCreatedAt;
    }

    /**
     * Set productLocalImageUpdatedAt
     *
     * @param \DateTime $productLocalImageUpdatedAt
     *
     * @return LocalProductImage
     */
    public function setProductLocalImageUpdatedAt($productLocalImageUpdatedAt)
    {
        $this->productLocalImageUpdatedAt = $productLocalImageUpdatedAt;

        return $this;
    }

    /**
     * Get productLocalImageUpdatedAt
     *
     * @return \DateTime
     */
    public function getProductLocalImageUpdatedAt()
    {
        return $this->productLocalImageUpdatedAt;
    }

    /**
     * Set localProduct
     *
     * @param \Dropshippers\APIBundle\Entity\LocalPsProduct $localProduct
     *
     * @return LocalProductImage
     */
    public function setLocalProduct(\Dropshippers\APIBundle\Entity\LocalPsProduct $localProduct = null)
    {
        $this->localProduct = $localProduct;

        return $this;
    }

    /**
     * Get localProduct
     *
     * @return \Dropshippers\APIBundle\Entity\LocalPsProduct
     */
    public function getLocalProduct()
    {
        return $this->localProduct;
    }
}
