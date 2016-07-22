<?php

namespace Dropshippers\APIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ds_request_message
 *
 * @ORM\Table(name="ds_request_message")
 * @ORM\Entity(repositoryClass="Dropshippers\APIBundle\Repository\ds_request_messageRepository")
 */
class ds_request_message
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
     * @var \DateTime
     *
     * @ORM\Column(name="request_message_created_at", type="datetimetz")
     */
    private $requestMessageCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="request_message_updated_at", type="datetimetz")
     */
    private $requestMessageUpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="request_message_message", type="text")
     */
    private $requestMessageMessage;


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
     * Set requestMessageCreatedAt
     *
     * @param \DateTime $requestMessageCreatedAt
     *
     * @return ds_request_message
     */
    public function setRequestMessageCreatedAt($requestMessageCreatedAt)
    {
        $this->requestMessageCreatedAt = $requestMessageCreatedAt;

        return $this;
    }

    /**
     * Get requestMessageCreatedAt
     *
     * @return \DateTime
     */
    public function getRequestMessageCreatedAt()
    {
        return $this->requestMessageCreatedAt;
    }

    /**
     * Set requestMessageUpdatedAt
     *
     * @param \DateTime $requestMessageUpdatedAt
     *
     * @return ds_request_message
     */
    public function setRequestMessageUpdatedAt($requestMessageUpdatedAt)
    {
        $this->requestMessageUpdatedAt = $requestMessageUpdatedAt;

        return $this;
    }

    /**
     * Get requestMessageUpdatedAt
     *
     * @return \DateTime
     */
    public function getRequestMessageUpdatedAt()
    {
        return $this->requestMessageUpdatedAt;
    }

    /**
     * Set requestMessageMessage
     *
     * @param string $requestMessageMessage
     *
     * @return ds_request_message
     */
    public function setRequestMessageMessage($requestMessageMessage)
    {
        $this->requestMessageMessage = $requestMessageMessage;

        return $this;
    }

    /**
     * Get requestMessageMessage
     *
     * @return string
     */
    public function getRequestMessageMessage()
    {
        return $this->requestMessageMessage;
    }
}
