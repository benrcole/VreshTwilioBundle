<?php

namespace Vresh\TwilioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 */
class Message
{
    /**
     * @var integer
     */
    private $id;


    /**
     * @var string
     */
    private $recipient;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \Vresh\TwilioBundle\Entity\TelephoneNumber
     */
    private $telephoneNumber;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;





    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

public function __toString()
{
    return ($this -> getContent()?'SMS to '.$this -> getRecipient():'n/a');
}

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Message
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
     * @return Message
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
     * Set telephoneNumber
     *
     * @param \Vresh\TwilioBundle\Entity\TelephoneNumber $telephoneNumber
     * @return Message
     */
    public function setTelephoneNumber(\Vresh\TwilioBundle\Entity\TelephoneNumber $telephoneNumber = null)
    {
        $this->telephoneNumber = $telephoneNumber;

        return $this;
    }

    /**
     * Get telephoneNumber
     *
     * @return \Vresh\TwilioBundle\Entity\TelephoneNumber 
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
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
     * Set recipient
     *
     * @param string $recipient
     * @return Message
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Get recipient
     *
     * @return string 
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * @var string
     */
    private $vendorReference;


    /**
     * Set vendorReference
     *
     * @param string $vendorReference
     * @return Message
     */
    public function setVendorReference($vendorReference)
    {
        $this->vendorReference = $vendorReference;

        return $this;
    }

    /**
     * Get vendorReference
     *
     * @return string 
     */
    public function getVendorReference()
    {
        return $this->vendorReference;
    }
}
