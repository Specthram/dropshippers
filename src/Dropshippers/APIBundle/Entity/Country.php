<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="ds_country")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\CountryRepository")
 */
class Country
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
     * @ORM\Column(name="iso_code", type="string", length=10)
     */
    private $isoCode;

    /**
     * @ORM\ManyToOne(targetEntity="Zone")
     * @ORM\JoinColumn(name="id_zone", referencedColumnName="id", nullable=false)
     */
    private $idZone;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set isoCode
     *
     * @param string $isoCode
     *
     * @return Country
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;

        return $this;
    }

    /**
     * Get isoCode
     *
     * @return string
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Country
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

    /**
     * Set idZone
     *
     * @param Zone $idZone
     *
     * @return Country
     */
    public function setIdZone(Zone $idZone)
    {
        $this->idZone = $idZone;

        return $this;
    }

    /**
     * Get idZone
     *
     * @return \Dropshippers\APIBundle\Entity\Zone
     */
    public function getIdZone()
    {
        return $this->idZone;
    }
}
