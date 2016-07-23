<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table(name="ds_module")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ModuleRepository")
 */
class Module
{
    /**
     * @ORM\ManyToOne(targetEntity="Shop", inversedBy="modules")
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
     * @var string
     *
     * @ORM\Column(name="module_type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="module_name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="module_lang", type="string", length=255, nullable=true)
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="web_service_key", type="string", length=255)
     */
    private $webServiceKey;

    /**
     * @var bool
     *
     * @ORM\Column(name="module_active", type="boolean")
     */
    private $active;

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
     * Set type
     *
     * @param string $type
     *
     * @return Module
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Module
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
     * Set lang
     *
     * @param string $lang
     *
     * @return Module
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Module
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set webServiceKey
     *
     * @param string $webServiceKey
     *
     * @return Module
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

    /**
     * Set shop
     *
     * @param \Dropshippers\APIBundle\Entity\Shop $shop
     *
     * @return Module
     */
    public function setShop(\Dropshippers\APIBundle\Entity\Shop $shop = null)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return \Dropshippers\APIBundle\Entity\Shop
     */
    public function getShop()
    {
        return $this->shop;
    }
}
