<?php
// src/Acme/UserBundle/Entity/User.php

namespace Demierre\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vlabs\MediaBundle\Annotation\Vlabs;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $firstname;
    
    /*
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     * 
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $lastname;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $landlinephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $mobilephone;

    /**
     * @var VlabsFile
     *
     * @ORM\ManyToOne(targetEntity="Image", cascade={"persist"})
     * 
     * @Vlabs\Media(identifier="image_entity", upload_dir="files/images")
     * @Assert\Valid()
     */
    private $image;

    /**
     * Set image
     *
     * @param AGI\UserBundle\Entity\Image $image
     * @return Article
     */
    public function setImage(Image $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return AGI\UserBundle\Entity\Image
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $birthdate;

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getLandlinephone() {
        return $this->landlinephone;
    }

    public function getMobilephone() {
        return $this->mobilephone;
    }

    public function getHascar() {
        return $this->hascar;
    }

    public function getNights() {
        return $this->nights;
    }

    public function getLanguages() {
        return $this->languages;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setLandlinephone($landlinephone) {
        $this->landlinephone = $landlinephone;
    }

    public function setMobilephone($mobilephone) {
        $this->mobilephone = $mobilephone;
    }

    public function getBirthdate() {
        return $this->birthdate ? clone $this->birthdate : null;
    }

    public function setBirthdate(\DateTime $birthdate = null) {
        $this->birthdate = $birthdate ? clone $birthdate : null;
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/profilepictures' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    public function __toString() {
        return $this->getLastname() . ' ' . $this->getFirstname();
    }
}