<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_manufacturer
 *
 * @ORM\Table(name="ds_manufacturer")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_manufacturerRepository")
 */
class ds_manufacturer
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
     * @ORM\Column(name="manufacturer_name", type="string", length=255)
     */
    private $manufacturerName;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer_description", type="text", nullable=true)
     */
    private $manufacturerDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer_origin", type="string", length=255, nullable=true)
     */
    private $manufacturerOrigin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="manufacturer_created_at", type="datetimetz")
     */
    private $manufacturerCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="manufacturer_updated_at", type="datetimetz")
     */
    private $manufacturerUpdatedAt;


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
     * Set manufacturerName
     *
     * @param string $manufacturerName
     *
     * @return ds_manufacturer
     */
    public function setManufacturerName($manufacturerName)
    {
        $this->manufacturerName = $manufacturerName;

        return $this;
    }

    /**
     * Get manufacturerName
     *
     * @return string
     */
    public function getManufacturerName()
    {
        return $this->manufacturerName;
    }

    /**
     * Set manufacturerDescription
     *
     * @param string $manufacturerDescription
     *
     * @return ds_manufacturer
     */
    public function setManufacturerDescription($manufacturerDescription)
    {
        $this->manufacturerDescription = $manufacturerDescription;

        return $this;
    }

    /**
     * Get manufacturerDescription
     *
     * @return string
     */
    public function getManufacturerDescription()
    {
        return $this->manufacturerDescription;
    }

    /**
     * Set manufacturerOrigin
     *
     * @param string $manufacturerOrigin
     *
     * @return ds_manufacturer
     */
    public function setManufacturerOrigin($manufacturerOrigin)
    {
        $this->manufacturerOrigin = $manufacturerOrigin;

        return $this;
    }

    /**
     * Get manufacturerOrigin
     *
     * @return string
     */
    public function getManufacturerOrigin()
    {
        return $this->manufacturerOrigin;
    }

    /**
     * Set manufacturerCreatedAt
     *
     * @param \DateTime $manufacturerCreatedAt
     *
     * @return ds_manufacturer
     */
    public function setManufacturerCreatedAt($manufacturerCreatedAt)
    {
        $this->manufacturerCreatedAt = $manufacturerCreatedAt;

        return $this;
    }

    /**
     * Get manufacturerCreatedAt
     *
     * @return \DateTime
     */
    public function getManufacturerCreatedAt()
    {
        return $this->manufacturerCreatedAt;
    }

    /**
     * Set manufacturerUpdatedAt
     *
     * @param \DateTime $manufacturerUpdatedAt
     *
     * @return ds_manufacturer
     */
    public function setManufacturerUpdatedAt($manufacturerUpdatedAt)
    {
        $this->manufacturerUpdatedAt = $manufacturerUpdatedAt;

        return $this;
    }

    /**
     * Get manufacturerUpdatedAt
     *
     * @return \DateTime
     */
    public function getManufacturerUpdatedAt()
    {
        return $this->manufacturerUpdatedAt;
    }
}
