<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartnershipRequest
 *
 * @ORM\Table(name="ds_partnership_request")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\PartnershipRequestRepository")
 */
class PartnershipRequest
{
    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\Shop")
     */
    private $shopHost;

    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\Shop")
     */
    private $shopGuest;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="partnership_request_created_at", type="datetime")
     */
    private $partnershipRequestCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="partnership_request_updated_at", type="datetime")
     */
    private $partnershipRequestUpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="partnership_request_status", type="string", length=255)
     */
    private $partnershipRequestStatus;

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
     * Set partnershipRequestCreatedAt
     *
     * @param \DateTime $partnershipRequestCreatedAt
     *
     * @return PartnershipRequest
     */
    public function setPartnershipRequestCreatedAt($partnershipRequestCreatedAt)
    {
        $this->partnershipRequestCreatedAt = $partnershipRequestCreatedAt;

        return $this;
    }

    /**
     * Get partnershipRequestCreatedAt
     *
     * @return \DateTime
     */
    public function getPartnershipRequestCreatedAt()
    {
        return $this->partnershipRequestCreatedAt;
    }

    /**
     * Set partnershipRequestUpdatedAt
     *
     * @param \DateTime $partnershipRequestUpdatedAt
     *
     * @return PartnershipRequest
     */
    public function setPartnershipRequestUpdatedAt($partnershipRequestUpdatedAt)
    {
        $this->partnershipRequestUpdatedAt = $partnershipRequestUpdatedAt;

        return $this;
    }

    /**
     * Get partnershipRequestUpdatedAt
     *
     * @return \DateTime
     */
    public function getPartnershipRequestUpdatedAt()
    {
        return $this->partnershipRequestUpdatedAt;
    }

    /**
     * Set partnershipRequestStatus
     *
     * @param string $partnershipRequestStatus
     *
     * @return PartnershipRequest
     */
    public function setPartnershipRequestStatus($partnershipRequestStatus)
    {
        $this->partnershipRequestStatus = $partnershipRequestStatus;

        return $this;
    }

    /**
     * Get partnershipRequestStatus
     *
     * @return string
     */
    public function getPartnershipRequestStatus()
    {
        return $this->partnershipRequestStatus;
    }
}
