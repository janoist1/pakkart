<?php

namespace HTD\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Art
 *
 * @ORM\Table(name="art")
 * @ORM\Entity(repositoryClass="HTD\AppBundle\Repository\ArtRepository")
 */
class Art
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=60, unique=false, nullable=false)
     */
    protected $title;

    /**
     * @var integer $artist_id
     *
     * @ORM\Column(name="artist_id", type="integer", unique=false, nullable=false)
     */
    protected $artist_id;

    /**
     * @var string $technique
     *
     * @ORM\Column(name="technique", type="string", length=60, unique=false, nullable=true)
     */
    protected $technique;

    /**
     * @var integer $price
     *
     * @ORM\Column(name="price", type="integer", unique=false, nullable=true)
     */
    protected $price;

    /**
     * @var integer $rating
     *
     * @ORM\Column(name="rating", type="integer", unique=false, nullable=true)
     */
    protected $rating;


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
     * @return Art
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
     * Set artist_id
     *
     * @param integer $artistId
     * @return Art
     */
    public function setArtistId($artistId)
    {
        $this->artist_id = $artistId;

        return $this;
    }

    /**
     * Get artist_id
     *
     * @return integer 
     */
    public function getArtistId()
    {
        return $this->artist_id;
    }

    /**
     * Set technique
     *
     * @param string $technique
     * @return Art
     */
    public function setTechnique($technique)
    {
        $this->technique = $technique;

        return $this;
    }

    /**
     * Get technique
     *
     * @return string 
     */
    public function getTechnique()
    {
        return $this->technique;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Art
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Art
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }
}
