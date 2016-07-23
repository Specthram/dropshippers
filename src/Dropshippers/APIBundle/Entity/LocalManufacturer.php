<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocalManufacturer
 *
 * @ORM\Table(name="ds_local_manufacturer")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\LocalManufacturerRepository")
 */
class LocalManufacturer
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
     * @return integer
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
     * @return LocalManufacturer
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
     * Set manufacturerLocalManufacturerId
     *
     * @param integer $manufacturerLocalManufacturerId
     *
     * @return LocalManufacturer
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

    /**
     * Set manufacturerLocalCreatedAt
     *
     * @param \DateTime $manufacturerLocalCreatedAt
     *
     * @return LocalManufacturer
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
     * @return LocalManufacturer
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
}
