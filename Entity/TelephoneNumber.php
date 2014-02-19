<?php

namespace Vresh\TwilioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TelephoneNumber
 */
class TelephoneNumber
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cli;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $messages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set cli
     *
     * @param string $cli
     * @return TelephoneNumber
     */
    public function setCli($cli)
    {
        $this->cli = $cli;

        return $this;
    }

    /**
     * Get cli
     *
     * @return string 
     */
    public function getCli()
    {
        return $this->cli;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return TelephoneNumber
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return TelephoneNumber
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
     * @return TelephoneNumber
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
     * Set enabled
     *
     * @param boolean $enabled
     * @return TelephoneNumber
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Add messages
     *
     * @param \Vresh\TwilioBundle\Entity\Message $messages
     * @return TelephoneNumber
     */
    public function addMessage(\Vresh\TwilioBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Vresh\TwilioBundle\Entity\Message $messages
     */
    public function removeMessage(\Vresh\TwilioBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
        $this -> setCreatedAt(new \DateTime);
    }

    /**
     * @ORM\PrePersist
     */
    public function setUpdatedValue()
    {
        $this -> setUpdatedAt(new \DateTime);
    }
    /**
     * @var integer
     */
    private $sendCount;


    /**
     * Set sendCount
     *
     * @param integer $sendCount
     * @return TelephoneNumber
     */
    public function setSendCount($sendCount)
    {
        $this->sendCount = $sendCount;

        return $this;
    }

    /**
     * Get sendCount
     *
     * @return integer 
     */
    public function getSendCount()
    {
        return $this->sendCount;
    }
}
