<?php

namespace HTD\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Welcome
 *
 * @ORM\Table(name="welcome")
 * @ORM\Entity(repositoryClass="HTD\AppBundle\Repository\WelcomeRepository")
 */
class Welcome
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     * @Assert\Length(max="60", maxMessage="A cím nem lehet hosszabb mint {{ limit }} karater.")
     * @ORM\Column(name="title", type="string", length=60, unique=false, nullable=false)
     */
    protected $title;

    /**
     * @var string $text
     *
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     * @ORM\Column(name="text", type="string", length=1000, unique=false, nullable=false)
     */
    protected $text;

    /**
     * @var string $path
     *
     * @Assert\NotBlank(message="A mező kitöltése kötelező")
     * @Assert\Length(max="255", maxMessage="A cím nem lehet hosszabb mint {{ limit }} karater.")
     * @ORM\Column(name="path", type="string", length=255, unique=false, nullable=false)
     */
    protected $path;

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
     * Set title
     *
     * @param string $title
     * @return Welcome
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Welcome
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Welcome
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
}
