<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_shop_tag
 *
 * @ORM\Table(name="ds_shop_tag")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_shop_tagRepository")
 */
class ds_shop_tag
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
     * @ORM\Column(name="shop_tag_name", type="string", length=255)
     */
    private $shopTagName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_tag_created_at", type="datetimetz")
     */
    private $shopTagCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_tag_updated_at", type="datetimetz")
     */
    private $shopTagUpdatedAt;


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
     * Set shopTagName
     *
     * @param string $shopTagName
     *
     * @return ds_shop_tag
     */
    public function setShopTagName($shopTagName)
    {
        $this->shopTagName = $shopTagName;

        return $this;
    }

    /**
     * Get shopTagName
     *
     * @return string
     */
    public function getShopTagName()
    {
        return $this->shopTagName;
    }

    /**
     * Set shopTagCreatedAt
     *
     * @param \DateTime $shopTagCreatedAt
     *
     * @return ds_shop_tag
     */
    public function setShopTagCreatedAt($shopTagCreatedAt)
    {
        $this->shopTagCreatedAt = $shopTagCreatedAt;

        return $this;
    }

    /**
     * Get shopTagCreatedAt
     *
     * @return \DateTime
     */
    public function getShopTagCreatedAt()
    {
        return $this->shopTagCreatedAt;
    }

    /**
     * Set shopTagUpdatedAt
     *
     * @param \DateTime $shopTagUpdatedAt
     *
     * @return ds_shop_tag
     */
    public function setShopTagUpdatedAt($shopTagUpdatedAt)
    {
        $this->shopTagUpdatedAt = $shopTagUpdatedAt;

        return $this;
    }

    /**
     * Get shopTagUpdatedAt
     *
     * @return \DateTime
     */
    public function getShopTagUpdatedAt()
    {
        return $this->shopTagUpdatedAt;
    }
}
