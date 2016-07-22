<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_local_manufacturer
 *
 * @ORM\Table(name="ds_local_manufacturer")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_local_manufacturerRepository")
 */
class ds_local_manufacturer
{

    /**
     * @ORM\OneToOne(targetEntity="ds_shop")
     * @ORM\JoinColumn(nullable=false, name="shop_id", referencedColumnName="shop_id")
     */
    private $shop_id;

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
     * @ORM\Column(name="manufacturer_local_name", type="string", length=255)
     */
    private $manufacturerLocalName;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="manufacturer_local_manufacturer_id")
     */
    private $manufacturerLocalManufacturerId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="manufacturer_local_created_at", type="datetimetz")
     */
    private $manufacturerLocalCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="manufacturer_local_updated_at", type="datetimetz")
     */
    private $manufacturerLocalUpdatedAt;


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
     * Set manufacturerLocalName
     *
     * @param string $manufacturerLocalName
     *
     * @return ds_local_manufacturer
     */
    public function setManufacturerLocalName($manufacturerLocalName)
    {
        $this->manufacturerLocalName = $manufacturerLocalName;

        return $this;
    }

    /**
     * Get manufacturerLocalName
     *
     * @return string
     */
    public function getManufacturerLocalName()
    {
        return $this->manufacturerLocalName;
    }

    /**
     * Set manufacturerLocalCreatedAt
     *
     * @param \DateTime $manufacturerLocalCreatedAt
     *
     * @return ds_local_manufacturer
     */
    public function setManufacturerLocalCreatedAt($manufacturerLocalCreatedAt)
    {
        $this->manufacturerLocalCreatedAt = $manufacturerLocalCreatedAt;

        return $this;
    }

    /**
     * Get manufacturerLocalCreatedAt
     *
     * @return \DateTime
     */
    public function getManufacturerLocalCreatedAt()
    {
        return $this->manufacturerLocalCreatedAt;
    }

    /**
     * Set manufacturerLocalUpdatedAt
     *
     * @param \DateTime $manufacturerLocalUpdatedAt
     *
     * @return ds_local_manufacturer
     */
    public function setManufacturerLocalUpdatedAt($manufacturerLocalUpdatedAt)
    {
        $this->manufacturerLocalUpdatedAt = $manufacturerLocalUpdatedAt;

        return $this;
    }

    /**
     * Get manufacturerLocalUpdatedAt
     *
     * @return \DateTime
     */
    public function getManufacturerLocalUpdatedAt()
    {
        return $this->manufacturerLocalUpdatedAt;
    }

    /**
     * Set shopId
     *
     * @param \Dropshippers\APIBundle\Entity\ds_shop $shopId
     *
     * @return ds_local_manufacturer
     */
    public function setShopId(\Dropshippers\APIBundle\Entity\ds_shop $shopId)
    {
        $this->shop_id = $shopId;

        return $this;
    }

    /**
     * Get shopId
     *
     * @return \Dropshippers\APIBundle\Entity\ds_shop
     */
    public function getShopId()
    {
        return $this->shop_id;
    }

    /**
     * Set manufacturerLocalManufacturerId
     *
     * @param integer $manufacturerLocalManufacturerId
     *
     * @return ds_local_manufacturer
     */
    public function setManufacturerLocalManufacturerId($manufacturerLocalManufacturerId)
    {
        $this->manufacturerLocalManufacturerId = $manufacturerLocalManufacturerId;

        return $this;
    }

    /**
     * Get manufacturerLocalManufacturerId
     *
     * @return integer
     */
    public function getManufacturerLocalManufacturerId()
    {
        return $this->manufacturerLocalManufacturerId;
    }
}
