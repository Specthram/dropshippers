<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_tax_group
 *
 * @ORM\Table(name="ds_tax_group")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_tax_groupRepository")
 */
class ds_tax_group
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
     * @ORM\Column(name="ds_tax_group_description", type="text")
     */
    private $dsTaxGroupDescription;

    /**
     * @var float
     *
     * @ORM\Column(name="ds_tax_group_value", type="float")
     */
    private $dsTaxGroupValue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ds_tax_group_created_at", type="datetimetz")
     */
    private $dsTaxGroupCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ds_tax_group_updated_at", type="datetimetz")
     */
    private $dsTaxGroupUpdatedAt;


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
     * Set dsTaxGroupDescription
     *
     * @param string $dsTaxGroupDescription
     *
     * @return ds_tax_group
     */
    public function setDsTaxGroupDescription($dsTaxGroupDescription)
    {
        $this->dsTaxGroupDescription = $dsTaxGroupDescription;

        return $this;
    }

    /**
     * Get dsTaxGroupDescription
     *
     * @return string
     */
    public function getDsTaxGroupDescription()
    {
        return $this->dsTaxGroupDescription;
    }

    /**
     * Set dsTaxGroupValue
     *
     * @param float $dsTaxGroupValue
     *
     * @return ds_tax_group
     */
    public function setDsTaxGroupValue($dsTaxGroupValue)
    {
        $this->dsTaxGroupValue = $dsTaxGroupValue;

        return $this;
    }

    /**
     * Get dsTaxGroupValue
     *
     * @return float
     */
    public function getDsTaxGroupValue()
    {
        return $this->dsTaxGroupValue;
    }

    /**
     * Set dsTaxGroupCreatedAt
     *
     * @param \DateTime $dsTaxGroupCreatedAt
     *
     * @return ds_tax_group
     */
    public function setDsTaxGroupCreatedAt($dsTaxGroupCreatedAt)
    {
        $this->dsTaxGroupCreatedAt = $dsTaxGroupCreatedAt;

        return $this;
    }

    /**
     * Get dsTaxGroupCreatedAt
     *
     * @return \DateTime
     */
    public function getDsTaxGroupCreatedAt()
    {
        return $this->dsTaxGroupCreatedAt;
    }

    /**
     * Set dsTaxGroupUpdatedAt
     *
     * @param \DateTime $dsTaxGroupUpdatedAt
     *
     * @return ds_tax_group
     */
    public function setDsTaxGroupUpdatedAt($dsTaxGroupUpdatedAt)
    {
        $this->dsTaxGroupUpdatedAt = $dsTaxGroupUpdatedAt;

        return $this;
    }

    /**
     * Get dsTaxGroupUpdatedAt
     *
     * @return \DateTime
     */
    public function getDsTaxGroupUpdatedAt()
    {
        return $this->dsTaxGroupUpdatedAt;
    }
}
