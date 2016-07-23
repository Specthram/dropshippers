<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manage
 *
 * @ORM\Table(name="ds_manage")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ManageRepository")
 */
class Manage
{
    //le manage pour plus tard, en attendant id shop directement dans le user
//    /**
//     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\User")
//     * @ORM\JoinColumn(nullable=false)
//     */
//    private $user;
//
//    /**
//     * @ORM\ManyToOne(targetEntity="Dropshippers\APIBundle\Entity\Shop")
//     */
//    private $shop;
    
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
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gerer_created_at", type="datetime")
     */
    private $createdAt;

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
     * Set isAdmin
     *
     * @param boolean $isAdmin
     *
     * @return Manage
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return boolean
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
     * @return Manage
     */
    public function setCanView($canView)
    {
        $this->canView = $canView;

        return $this;
    }

    /**
     * Get canView
     *
     * @return boolean
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
     * @return Manage
     */
    public function setCanRead($canRead)
    {
        $this->canRead = $canRead;

        return $this;
    }

    /**
     * Get canRead
     *
     * @return boolean
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
     * @return Manage
     */
    public function setCanAdd($canAdd)
    {
        $this->canAdd = $canAdd;

        return $this;
    }

    /**
     * Get canAdd
     *
     * @return boolean
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
     * @return Manage
     */
    public function setCanEdit($canEdit)
    {
        $this->canEdit = $canEdit;

        return $this;
    }

    /**
     * Get canEdit
     *
     * @return boolean
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
     * @return Manage
     */
    public function setCanDelete($canDelete)
    {
        $this->canDelete = $canDelete;

        return $this;
    }

    /**
     * Get canDelete
     *
     * @return boolean
     */
    public function getCanDelete()
    {
        return $this->canDelete;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Manage
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Manage
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
