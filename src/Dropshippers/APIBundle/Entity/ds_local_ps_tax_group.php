<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_local_ps_tax_group
 *
 * @ORM\Table(name="ds_local_ps_tax_group")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_local_ps_tax_groupRepository")
 */
class ds_local_ps_tax_group
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
     * @var float
     *
     * @ORM\Column(name="ps_local_tax_group_value", type="float")
     */
    private $psLocalTaxGroupValue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ps_local_tax_group_created_at", type="datetimetz")
     */
    private $psLocalTaxGroupCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ps_local_tax_group_updated_at", type="datetimetz")
     */
    private $psLocalTaxGroupUpdatedAt;


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
     * Set psLocalTaxGroupValue
     *
     * @param float $psLocalTaxGroupValue
     *
     * @return ds_local_ps_tax_group
     */
    public function setPsLocalTaxGroupValue($psLocalTaxGroupValue)
    {
        $this->psLocalTaxGroupValue = $psLocalTaxGroupValue;

        return $this;
    }

    /**
     * Get psLocalTaxGroupValue
     *
     * @return float
     */
    public function getPsLocalTaxGroupValue()
    {
        return $this->psLocalTaxGroupValue;
    }

    /**
     * Set psLocalTaxGroupCreatedAt
     *
     * @param \DateTime $psLocalTaxGroupCreatedAt
     *
     * @return ds_local_ps_tax_group
     */
    public function setPsLocalTaxGroupCreatedAt($psLocalTaxGroupCreatedAt)
    {
        $this->psLocalTaxGroupCreatedAt = $psLocalTaxGroupCreatedAt;

        return $this;
    }

    /**
     * Get psLocalTaxGroupCreatedAt
     *
     * @return \DateTime
     */
    public function getPsLocalTaxGroupCreatedAt()
    {
        return $this->psLocalTaxGroupCreatedAt;
    }

    /**
     * Set psLocalTaxGroupUpdatedAt
     *
     * @param \DateTime $psLocalTaxGroupUpdatedAt
     *
     * @return ds_local_ps_tax_group
     */
    public function setPsLocalTaxGroupUpdatedAt($psLocalTaxGroupUpdatedAt)
    {
        $this->psLocalTaxGroupUpdatedAt = $psLocalTaxGroupUpdatedAt;

        return $this;
    }

    /**
     * Get psLocalTaxGroupUpdatedAt
     *
     * @return \DateTime
     */
    public function getPsLocalTaxGroupUpdatedAt()
    {
        return $this->psLocalTaxGroupUpdatedAt;
    }
}
