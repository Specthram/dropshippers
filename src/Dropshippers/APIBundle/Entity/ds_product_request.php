<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_product_request
 *
 * @ORM\Table(name="ds_product_request")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_product_requestRepository")
 */
class ds_product_request
{
    /**
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_request_created_at", type="datetimetz")
     */
    private $productRequestCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_request_updated_at", type="datetimetz")
     */
    private $productRequestUpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="product_request_status", type="string", length=255)
     */
    private $productRequestStatus;



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
     * Set productRequestCreatedAt
     *
     * @param \DateTime $productRequestCreatedAt
     *
     * @return ds_product_request
     */
    public function setProductRequestCreatedAt($productRequestCreatedAt)
    {
        $this->productRequestCreatedAt = $productRequestCreatedAt;

        return $this;
    }

    /**
     * Get productRequestCreatedAt
     *
     * @return \DateTime
     */
    public function getProductRequestCreatedAt()
    {
        return $this->productRequestCreatedAt;
    }

    /**
     * Set productRequestUpdatedAt
     *
     * @param \DateTime $productRequestUpdatedAt
     *
     * @return ds_product_request
     */
    public function setProductRequestUpdatedAt($productRequestUpdatedAt)
    {
        $this->productRequestUpdatedAt = $productRequestUpdatedAt;

        return $this;
    }

    /**
     * Get productRequestUpdatedAt
     *
     * @return \DateTime
     */
    public function getProductRequestUpdatedAt()
    {
        return $this->productRequestUpdatedAt;
    }

    /**
     * Set productRequestStatus
     *
     * @param string $productRequestStatus
     *
     * @return ds_product_request
     */
    public function setProductRequestStatus($productRequestStatus)
    {
        $this->productRequestStatus = $productRequestStatus;

        return $this;
    }

    /**
     * Get productRequestStatus
     *
     * @return string
     */
    public function getProductRequestStatus()
    {
        return $this->productRequestStatus;
    }
}
