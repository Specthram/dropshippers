<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Dropshippers\APIBundle\Entity\Product;
use Dropshippers\APIBundle\Entity\PartnershipRequest;
use Dropshippers\APIBundle\Entity\User;
use Dropshippers\APIBundle\Entity\Module;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="ds_shop")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ShopRepository")
 */
class Shop
{
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="PartnershipRequest", mappedBy="shop_host")
     */
    private $request_host;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="PartnershipRequest", mappedBy="shop_guest")
     */
    private $request_guest;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="User", mappedBy="shop")
    */

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Module", mappedBy="shop")
     */
    private $modules;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_status", type="string", length=255)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_phone", type="string", length=30, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_created_at", type="datetimetz")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_updated_at", type="datetimetz")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_address_zipcode", type="string", length=255, nullable=true)
     */
    private $addressZipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="shop_city", type="string", length=255, nullable=true)
     */
    private $city;


    /**
     * @var string
     *
     * @ORM\Column(name="shop_address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="dropshippersRef", type="string", length=255)
     */
    private $dropshippersRef;

    /**
     * @ORM\ManyToMany(targetEntity="Category", cascade={"remove", "persist"})
     * @ORM\JoinTable(name="shop_category",
     *     joinColumns={@ORM\JoinColumn(name="shop_id", referencedColumnName="id", onDelete="cascade")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="cascade")}
     *     )
     */
    private $categories;


    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="rib", type="string", nullable=true)
     */
    private $rib;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->request_host = new ArrayCollection();
        $this->request_guest = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Shop
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
     * Set status
     *
     * @param string $status
     *
     * @return Shop
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Shop
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Shop
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Shop
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Shop
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

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Shop
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
     * Set addressZipcode
     *
     * @param string $addressZipcode
     *
     * @return Shop
     */
    public function setAddressZipcode($addressZipcode)
    {
        $this->addressZipcode = $addressZipcode;

        return $this;
    }

    /**
     * Get addressZipcode
     *
     * @return string
     */
    public function getAddressZipcode()
    {
        return $this->addressZipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Shop
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Shop
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add requestHost
     *
     * @param \Dropshippers\APIBundle\Entity\PartnershipRequest $requestHost
     *
     * @return Shop
     */
    public function addRequestHost(PartnershipRequest $requestHost)
    {
        $this->request_host[] = $requestHost;

        return $this;
    }

    /**
     * Remove requestHost
     *
     * @param \Dropshippers\APIBundle\Entity\PartnershipRequest $requestHost
     */
    public function removeRequestHost(PartnershipRequest $requestHost)
    {
        $this->request_host->removeElement($requestHost);
    }

    /**
     * Get requestHost
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequestHost()
    {
        return $this->request_host;
    }

    /**
     * Add requestGuest
     *
     * @param \Dropshippers\APIBundle\Entity\PartnershipRequest $requestGuest
     *
     * @return Shop
     */
    public function addRequestGuest(PartnershipRequest $requestGuest)
    {
        $this->request_guest[] = $requestGuest;

        return $this;
    }

    /**
     * Remove requestGuest
     *
     * @param \Dropshippers\APIBundle\Entity\PartnershipRequest $requestGuest
     */
    public function removeRequestGuest(PartnershipRequest $requestGuest)
    {
        $this->request_guest->removeElement($requestGuest);
    }

    /**
     * Get requestGuest
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequestGuest()
    {
        return $this->request_guest;
    }

    /**
     * Add user
     *
     * @param \Dropshippers\APIBundle\Entity\User $user
     *
     * @return Shop
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Dropshippers\APIBundle\Entity\User $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add module
     *
     * @param \Dropshippers\APIBundle\Entity\Module $module
     *
     * @return Shop
     */
    public function addModule(Module $module)
    {
        $this->modules[] = $module;

        return $this;
    }

    /**
     * Remove module
     *
     * @param \Dropshippers\APIBundle\Entity\Module $module
     */
    public function removeModule(Module $module)
    {
        $this->modules->removeElement($module);
    }

    /**
     * Get modules
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Shop
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set dropshippersRef
     *
     * @param string $dropshippersRef
     *
     * @return Shop
     */
    public function setDropshippersRef($dropshippersRef)
    {
        $this->dropshippersRef = $dropshippersRef;

        return $this;
    }

    /**
     * Get dropshippersRef
     *
     * @return string
     */
    public function getDropshippersRef()
    {
        return $this->dropshippersRef;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Add category
     *
     * @param \Dropshippers\APIBundle\Entity\Category $category
     *
     * @return shop
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Dropshippers\APIBundle\Entity\Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return mixed
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * @param mixed $rib
     */
    public function setRib($rib)
    {
        $this->rib = $rib;
    }
}
