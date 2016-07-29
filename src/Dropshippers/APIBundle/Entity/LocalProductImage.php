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
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_image_name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_image_path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_image_link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_image_created_at", type="datetimetz")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_image_updated_at", type="datetimetz")
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
     * Set type
     *
     * @param string $type
     *
     * @return LocalProductImage
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return LocalProductImage
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return LocalProductImage
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return LocalProductImage
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
     * @return LocalProductImage
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return LocalProductImage
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
}
