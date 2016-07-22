<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_local_product_tag
 *
 * @ORM\Table(name="ds_local_product_tag")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_local_product_tagRepository")
 */
class ds_local_product_tag
{
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_local_tag_name", type="string", length=255)
     */
    private $productLocalTagName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_local_tag_created_at", type="datetimetz")
     */
    private $productLocalTagCreatedAt;

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
     * Set productLocalTagName
     *
     * @param string $productLocalTagName
     *
     * @return ds_local_product_tag
     */
    public function setProductLocalTagName($productLocalTagName)
    {
        $this->productLocalTagName = $productLocalTagName;

        return $this;
    }

    /**
     * Get productLocalTagName
     *
     * @return string
     */
    public function getProductLocalTagName()
    {
        return $this->productLocalTagName;
    }

    /**
     * Set productLocalTagCreatedAt
     *
     * @param \DateTime $productLocalTagCreatedAt
     *
     * @return ds_local_product_tag
     */
    public function setProductLocalTagCreatedAt($productLocalTagCreatedAt)
    {
        $this->productLocalTagCreatedAt = $productLocalTagCreatedAt;

        return $this;
    }

    /**
     * Get productLocalTagCreatedAt
     *
     * @return \DateTime
     */
    public function getProductLocalTagCreatedAt()
    {
        return $this->productLocalTagCreatedAt;
    }

    /**
     * Set productLocalUpdatedAt
     *
     * @param \DateTime $productLocalUpdatedAt
     *
     * @return ds_local_product_tag
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
}
