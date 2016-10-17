<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryLocale
 *
 * @ORM\Table(name="ds_category_locale")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\CategoryLocaleRepository")
 */
class CategoryLocale
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
     * @ORM\JoinColumn(nullable=true, name="category_id")
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $category;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="language", type="string", length=255)
//     */
//    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id", nullable=false)
     */
    private $language;

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
     * Set category
     *
     * @param string $category
     *
     * @return CategoryLocale
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CategoryLocale
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
     * Set language
     *
     * @param Lang $language
     *
     * @return CategoryLocale
     */
    public function setLanguage(Lang $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return Lang
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
