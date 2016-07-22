<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_local_product_image
 *
 * @ORM\Table(name="ds_local_product_image")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_local_product_imageRepository")
 */
class ds_local_product_image
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
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\ds_local_ps_product")
     */
    private $localProductImage;


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
     * Set productLocalImageType
     *
     * @param string $productLocalImageType
     *
     * @return ds_local_product_image
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
     * @return ds_local_product_image
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
     * @return ds_local_product_image
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
     * @return ds_local_product_image
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
     * @return ds_local_product_image
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
     * Set localProductImage
     *
     * @param \Dropshippers\APIBundle\Entity\ds_local_ps_product $localProductImage
     *
     * @return ds_local_product_image
     */
    public function setLocalProductImage(\Dropshippers\APIBundle\Entity\ds_local_ps_product $localProductImage = null)
    {
        $this->localProductImage = $localProductImage;

        return $this;
    }

    /**
     * Get localProductImage
     *
     * @return \Dropshippers\APIBundle\Entity\ds_local_ps_product
     */
    public function getLocalProductImage()
    {
        return $this->localProductImage;
    }
}
