<?php

namespace CitiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="CitiesBundle\Repository\CityRepository")
 */
class City
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
     * @ORM\Column(name="name", type="string", length=35)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="CountryCode", type="string", length=3)
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="District", type="string", length=20)
     */
    private $district;

    /**
     * @var int
     *
     * @ORM\Column(name="Population", type="integer", options={"default" : 0})
     */
    private $population;
    
    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="cityCode")
     * @ORM\JoinColumn(name="countryCode", referencedColumnName="Code")
     */
    private $cityFKey;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return City
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return City
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string 
     */
    public function getCountryCode() : string
    {
        return $this->countryCode;
    }

    /**
     * Set district
     *
     * @param string $district
     * @return City
     */
    public function setDistrict(string $district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string 
     */
    public function getDistrict() : string
    {
        return $this->district;
    }

    /**
     * Set population
     *
     * @param integer $population
     * @return City
     */
    public function setPopulation(int $population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation() : int
    {
        return $this->population;
    }

    /**
     * Set countryCodeFKey
     *
     * @param Country $countryCodeFKey
     * @return City
     */
    public function setCountryCodeFKey(Country $countryCodeFKey = null)
    {
        $this->countryCodeFKey = $countryCodeFKey;

        return $this;
    }

    /**
     * Get countryCodeFKey
     *
     * @return Country
     */
    public function getCountryCodeFKey()
    {
        return $this->countryCodeFKey;
    }

    /**
     * Set cityFKey
     *
     * @param Country $cityFKey
     * @return City
     */
    public function setCityFKey(Country $cityFKey = null)
    {
        $this->cityFKey = $cityFKey;

        return $this;
    }

    /**
     * Get cityFKey
     *
     * @return Country
     */
    public function getCityFKey()
    {
        return $this->cityFKey;
    }
}
