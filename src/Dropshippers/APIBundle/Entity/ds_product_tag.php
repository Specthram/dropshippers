<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_product_tag
 *
 * @ORM\Table(name="ds_product_tag")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_product_tagRepository")
 */
class ds_product_tag
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
     * @ORM\Column(name="ds_product_tag_name", type="string", length=255)
     */
    private $dsProductTagName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ds_product_tag_created_at", type="datetimetz")
     */
    private $dsProductTagCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ds_product_tag_updated_at", type="datetimetz")
     */
    private $dsProductTagUpdatedAt;


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
     * Set dsProductTagName
     *
     * @param string $dsProductTagName
     *
     * @return ds_product_tag
     */
    public function setDsProductTagName($dsProductTagName)
    {
        $this->dsProductTagName = $dsProductTagName;

        return $this;
    }

    /**
     * Get dsProductTagName
     *
     * @return string
     */
    public function getDsProductTagName()
    {
        return $this->dsProductTagName;
    }

    /**
     * Set dsProductTagCreatedAt
     *
     * @param \DateTime $dsProductTagCreatedAt
     *
     * @return ds_product_tag
     */
    public function setDsProductTagCreatedAt($dsProductTagCreatedAt)
    {
        $this->dsProductTagCreatedAt = $dsProductTagCreatedAt;

        return $this;
    }

    /**
     * Get dsProductTagCreatedAt
     *
     * @return \DateTime
     */
    public function getDsProductTagCreatedAt()
    {
        return $this->dsProductTagCreatedAt;
    }

    /**
     * Set dsProductTagUpdatedAt
     *
     * @param \DateTime $dsProductTagUpdatedAt
     *
     * @return ds_product_tag
     */
    public function setDsProductTagUpdatedAt($dsProductTagUpdatedAt)
    {
        $this->dsProductTagUpdatedAt = $dsProductTagUpdatedAt;

        return $this;
    }

    /**
     * Get dsProductTagUpdatedAt
     *
     * @return \DateTime
     */
    public function getDsProductTagUpdatedAt()
    {
        return $this->dsProductTagUpdatedAt;
    }
}
