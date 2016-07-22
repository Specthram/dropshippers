<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_gerer
 *
 * @ORM\Table(name="ds_gerer")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_gererRepository")
 */
class ds_gerer
{
    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\ds_shop")
     * @ORM\JoinColumn(nullable=false, name="shop_id", referencedColumnName="shop_id")
     */
    private $shop;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="isAdmin", type="boolean")
     */
    private $isAdmin;

    /**
     * @var bool
     *
     * @ORM\Column(name="can_view", type="boolean")
     */
    private $canView;

    /**
     * @var bool
     *
     * @ORM\Column(name="can_read", type="boolean")
     */
    private $canRead;

    /**
     * @var bool
     *
     * @ORM\Column(name="can_add", type="boolean")
     */
    private $canAdd;

    /**
     * @var bool
     *
     * @ORM\Column(name="can_edit", type="boolean")
     */
    private $canEdit;

    /**
     * @var bool
     *
     * @ORM\Column(name="can_delete", type="boolean")
     */
    private $canDelete;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gerer_updated_at", type="datetime")
     */
    private $gererUpdatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gerer_created_at", type="datetime")
     */
    private $gererCreatedAt;


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
     * Set isAdmin
     *
     * @param boolean $isAdmin
     *
     * @return ds_gerer
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return bool
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set canView
     *
     * @param boolean $canView
     *
     * @return ds_gerer
     */
    public function setCanView($canView)
    {
        $this->canView = $canView;

        return $this;
    }

    /**
     * Get canView
     *
     * @return bool
     */
    public function getCanView()
    {
        return $this->canView;
    }

    /**
     * Set canRead
     *
     * @param boolean $canRead
     *
     * @return ds_gerer
     */
    public function setCanRead($canRead)
    {
        $this->canRead = $canRead;

        return $this;
    }

    /**
     * Get canRead
     *
     * @return bool
     */
    public function getCanRead()
    {
        return $this->canRead;
    }

    /**
     * Set canAdd
     *
     * @param boolean $canAdd
     *
     * @return ds_gerer
     */
    public function setCanAdd($canAdd)
    {
        $this->canAdd = $canAdd;

        return $this;
    }

    /**
     * Get canAdd
     *
     * @return bool
     */
    public function getCanAdd()
    {
        return $this->canAdd;
    }

    /**
     * Set canEdit
     *
     * @param boolean $canEdit
     *
     * @return ds_gerer
     */
    public function setCanEdit($canEdit)
    {
        $this->canEdit = $canEdit;

        return $this;
    }

    /**
     * Get canEdit
     *
     * @return bool
     */
    public function getCanEdit()
    {
        return $this->canEdit;
    }

    /**
     * Set canDelete
     *
     * @param boolean $canDelete
     *
     * @return ds_gerer
     */
    public function setCanDelete($canDelete)
    {
        $this->canDelete = $canDelete;

        return $this;
    }

    /**
     * Get canDelete
     *
     * @return bool
     */
    public function getCanDelete()
    {
        return $this->canDelete;
    }

    /**
     * Set gererUpdatedAt
     *
     * @param \DateTime $gererUpdatedAt
     *
     * @return ds_gerer
     */
    public function setGererUpdatedAt($gererUpdatedAt)
    {
        $this->gererUpdatedAt = $gererUpdatedAt;

        return $this;
    }

    /**
     * Get gererUpdatedAt
     *
     * @return \DateTime
     */
    public function getGererUpdatedAt()
    {
        return $this->gererUpdatedAt;
    }

    /**
     * Set gererCreatedAt
     *
     * @param \DateTime $gererCreatedAt
     *
     * @return ds_gerer
     */
    public function setGererCreatedAt($gererCreatedAt)
    {
        $this->gererCreatedAt = $gererCreatedAt;

        return $this;
    }

    /**
     * Get gererCreatedAt
     *
     * @return \DateTime
     */
    public function getGererCreatedAt()
    {
        return $this->gererCreatedAt;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set shop
     *
     * @param \Dropshippers\APIBundle\Entity\ds_shop $shop
     *
     * @return ds_gerer
     */
    public function setShop(\Dropshippers\APIBundle\Entity\ds_shop $shop)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return \Dropshippers\APIBundle\Entity\ds_shop
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Set user
     *
     * @param \Dropshippers\APIBundle\Entity\User $user
     *
     * @return ds_gerer
     */
    public function setUser(\Dropshippers\APIBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }
}
