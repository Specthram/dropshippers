<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_partnership_request
 *
 * @ORM\Table(name="ds_partnership_request")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_partnership_requestRepository")
 */
class ds_partnership_request
{
    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\ds_shop")
     * @ORM\JoinColumn(nullable=false, name="shop_id", referencedColumnName="shop_id")
     */
    private $shop_host;

    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\ds_shop")
     * @ORM\JoinColumn(nullable=false, name="shop_id", referencedColumnName="shop_id")
     */
    private $shop_guest;

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
     * @return int
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
     * @return ds_partnership_request
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
     * @return ds_partnership_request
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
     * @return ds_partnership_request
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

    /**
     * @return mixed
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * @param mixed $shop
     */
    public function setShop(ds_shop $shop)
    {
        $this->shop = $shop;

        return $this;
    }



    /**
     * Set shopHost
     *
     * @param \Dropshippers\APIBundle\Entity\ds_shop $shopHost
     *
     * @return ds_partnership_request
     */
    public function setShopHost(\Dropshippers\APIBundle\Entity\ds_shop $shopHost)
    {
        $this->shop_host = $shopHost;

        return $this;
    }

    /**
     * Get shopHost
     *
     * @return \Dropshippers\APIBundle\Entity\ds_shop
     */
    public function getShopHost()
    {
        return $this->shop_host;
    }

    /**
     * Set shopGuest
     *
     * @param \Dropshippers\APIBundle\Entity\ds_shop $shopGuest
     *
     * @return ds_partnership_request
     */
    public function setShopGuest(\Dropshippers\APIBundle\Entity\ds_shop $shopGuest)
    {
        $this->shop_guest = $shopGuest;

        return $this;
    }

    /**
     * Get shopGuest
     *
     * @return \Dropshippers\APIBundle\Entity\ds_shop
     */
    public function getShopGuest()
    {
        return $this->shop_guest;
    }
}
