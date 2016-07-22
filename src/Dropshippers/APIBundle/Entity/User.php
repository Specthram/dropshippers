<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="ds_gerer", mappedBy="user")
     */
    private $gerer;

    /**
     * @ORM\Column(name="web_service_key", nullable=true, type="string", length=255)
     */
    private $webServiceKey;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->gerer = new ArrayCollection();
    }

    /**
     * Add gerer
     *
     * @param \Dropshippers\APIBundle\Entity\ds_gerer $gerer
     *
     * @return User
     */
    public function addGerer(\Dropshippers\APIBundle\Entity\ds_gerer $gerer)
    {
        $this->gerer[] = $gerer;

        return $this;
    }

    /**
     * Remove gerer
     *
     * @param \Dropshippers\APIBundle\Entity\ds_gerer $gerer
     */
    public function removeGerer(\Dropshippers\APIBundle\Entity\ds_gerer $gerer)
    {
        $this->gerer->removeElement($gerer);
    }

    /**
     * Get gerer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGerer()
    {
        return $this->gerer;
    }

    /**
     * Set webServiceKey
     *
     * @param string $webServiceKey
     *
     * @return User
     */
    public function setWebServiceKey($webServiceKey)
    {
        $this->webServiceKey = $webServiceKey;

        return $this;
    }

    /**
     * Get webServiceKey
     *
     * @return string
     */
    public function getWebServiceKey()
    {
        return $this->webServiceKey;
    }
}
