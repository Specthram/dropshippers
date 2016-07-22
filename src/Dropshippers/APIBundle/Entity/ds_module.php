<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_module
 *
 * @ORM\Table(name="ds_module")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_moduleRepository")
 */
class ds_module
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
     * @ORM\Column(name="module_type", type="string", length=255)
     */
    private $moduleType;

    /**
     * @var string
     *
     * @ORM\Column(name="module_name", type="string", length=255)
     */
    private $moduleName;

    /**
     * @var string
     *
     * @ORM\Column(name="module_lang", type="string", length=255, nullable=true)
     */
    private $moduleLang;

    /**
     * @var bool
     *
     * @ORM\Column(name="module_active", type="boolean")
     */
    private $moduleActive;


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
     * Set moduleType
     *
     * @param string $moduleType
     *
     * @return ds_module
     */
    public function setModuleType($moduleType)
    {
        $this->moduleType = $moduleType;

        return $this;
    }

    /**
     * Get moduleType
     *
     * @return string
     */
    public function getModuleType()
    {
        return $this->moduleType;
    }

    /**
     * Set moduleName
     *
     * @param string $moduleName
     *
     * @return ds_module
     */
    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;

        return $this;
    }

    /**
     * Get moduleName
     *
     * @return string
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }

    /**
     * Set moduleLang
     *
     * @param string $moduleLang
     *
     * @return ds_module
     */
    public function setModuleLang($moduleLang)
    {
        $this->moduleLang = $moduleLang;

        return $this;
    }

    /**
     * Get moduleLang
     *
     * @return string
     */
    public function getModuleLang()
    {
        return $this->moduleLang;
    }

    /**
     * Set moduleActive
     *
     * @param boolean $moduleActive
     *
     * @return ds_module
     */
    public function setModuleActive($moduleActive)
    {
        $this->moduleActive = $moduleActive;

        return $this;
    }

    /**
     * Get moduleActive
     *
     * @return bool
     */
    public function getModuleActive()
    {
        return $this->moduleActive;
    }
}
