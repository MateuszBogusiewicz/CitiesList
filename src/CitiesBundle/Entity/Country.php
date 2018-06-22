<?php

namespace CitiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="CitiesBundle\Repository\CountryRepository")
 */
class Country
{
    const CONTINENT_ASIA = 'Asia';
    const CONTINENT_EUROPE = 'Europe';
    const CONTINENT_NORTH_AMERICA = 'North America';
    const CONTINENT_AFRICA = 'Africa';
    const CONTINENT_OCEANIA = 'Oceania';
    const CONTINENT_ANTARCTICA= 'Antarctica';
    const CONTINENT_SOUTH_AMERICA = 'South America';
    
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="Code", type="string", length=3)
     */
    private $code;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=52)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Continent", type="string", options={"default" : "Asia"})
     */
    private $continent;

    /**
     * @var string
     *
     * @ORM\Column(name="Region", type="string", length=26)
     */
    private $region;

    /**
     * @var float
     *
     * @ORM\Column(name="SurfaceArea", type="float", options={"default" : 0.00})
     */
    private $surfaceArea;

    /**
     * @var int
     *
     * @ORM\Column(name="IndeepYear", type="integer", nullable = true, options={"default" : "null"})
     */
    private $indeepYear;

    /**
     * @var int
     *
     * @ORM\Column(name="Population", type="integer", options={"default" : 0})
     */
    private $population;

    /**
     * @var float
     *
     * @ORM\Column(name="LifeExpectancy", type="float", nullable = true, options={"default" : null})
     */
    private $lifeExpectancy;

    /**
     * @var float
     *
     * @ORM\Column(name="GNP", type="float", nullable = true, options={"default" : null})
     */
    private $gNP;

    /**
     * @var float
     *
     * @ORM\Column(name="GNPOld", type="float", nullable = true, options={"default" : null})
     */
    private $gNPOld;

    /**
     * @var string
     *
     * @ORM\Column(name="LocalName", type="string", length=45)
     */
    private $localName;

    /**
     * @var string
     *
     * @ORM\Column(name="GovernmentForm", type="string", length=45)
     */
    private $governmentForm;

    /**
     * @var string
     *
     * @ORM\Column(name="HeadOfState", type="string", length=60, nullable = true, options={"default" : null})
     */
    private $headOfState;

    /**
     * @var int
     *
     * @ORM\Column(name="Capital", type="integer", nullable = true, options={"default" : null})
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="Code2", type="string", length=2)
     */
    private $code2;
    
    /**
     * @ORM\OneToMany(targetEntity="City", mappedBy="cityFKey")
     */
    private $cityCode;
    
    /**
     * @ORM\OneToMany(targetEntity="CountryLanguage", mappedBy="countryLanguageFKey")
     */
    private $countryLanguageCode;
    
    public function __construct() {
        $this->cityCode = new ArrayCollection();
        $this->countryLanguageCode = new ArrayCollection();
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
     * Set code
     *
     * @param string $code
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Country
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
     * Set continent
     *
     * @param string $continent
     * @return Country
     */
    public function setContinent($continent)
    {
        if (!in_array($continent, [self::CONTINENT_ASIA, self::CONTINENT_EUROPE,self::CONTINENT_NORTH_AMERICA,self::CONTINENT_AFRICA,
            self::CONTINENT_OCEANIA,self::CONTINENT_ANTARCTICA, self::CONTINENT_SOUTH_AMERICA])){
            throw new \InvalidArgumentException("Invalid continent");
        }
        
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return string 
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Country
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set surfaceArea
     *
     * @param float $surfaceArea
     * @return Country
     */
    public function setSurfaceArea($surfaceArea)
    {
        $this->surfaceArea = $surfaceArea;

        return $this;
    }

    /**
     * Get surfaceArea
     *
     * @return float 
     */
    public function getSurfaceArea()
    {
        return $this->surfaceArea;
    }

    /**
     * Set indeepYear
     *
     * @param integer $indeepYear
     * @return Country
     */
    public function setIndeepYear($indeepYear)
    {
        $this->indeepYear = $indeepYear;

        return $this;
    }

    /**
     * Get indeepYear
     *
     * @return integer 
     */
    public function getIndeepYear()
    {
        return $this->indeepYear;
    }

    /**
     * Set population
     *
     * @param integer $population
     * @return Country
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set lifeExpectancy
     *
     * @param float $lifeExpectancy
     * @return Country
     */
    public function setLifeExpectancy($lifeExpectancy)
    {
        $this->lifeExpectancy = $lifeExpectancy;

        return $this;
    }

    /**
     * Get lifeExpectancy
     *
     * @return float 
     */
    public function getLifeExpectancy()
    {
        return $this->lifeExpectancy;
    }

    /**
     * Set gNP
     *
     * @param float $gNP
     * @return Country
     */
    public function setGNP($gNP)
    {
        $this->gNP = $gNP;

        return $this;
    }

    /**
     * Get gNP
     *
     * @return float 
     */
    public function getGNP()
    {
        return $this->gNP;
    }

    /**
     * Set gNPOld
     *
     * @param float $gNPOld
     * @return Country
     */
    public function setGNPOld($gNPOld)
    {
        $this->gNPOld = $gNPOld;

        return $this;
    }

    /**
     * Get gNPOld
     *
     * @return float 
     */
    public function getGNPOld()
    {
        return $this->gNPOld;
    }

    /**
     * Set localName
     *
     * @param string $localName
     * @return Country
     */
    public function setLocalName($localName)
    {
        $this->localName = $localName;

        return $this;
    }

    /**
     * Get localName
     *
     * @return string 
     */
    public function getLocalName()
    {
        return $this->localName;
    }

    /**
     * Set governmentForm
     *
     * @param string $governmentForm
     * @return Country
     */
    public function setGovernmentForm($governmentForm)
    {
        $this->governmentForm = $governmentForm;

        return $this;
    }

    /**
     * Get governmentForm
     *
     * @return string 
     */
    public function getGovernmentForm()
    {
        return $this->governmentForm;
    }

    /**
     * Set headOfState
     *
     * @param string $headOfState
     * @return Country
     */
    public function setHeadOfState($headOfState)
    {
        $this->headOfState = $headOfState;

        return $this;
    }

    /**
     * Get headOfState
     *
     * @return string 
     */
    public function getHeadOfState()
    {
        return $this->headOfState;
    }

    /**
     * Set capital
     *
     * @param integer $capital
     * @return Country
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return integer 
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set code2
     *
     * @param string $code2
     * @return Country
     */
    public function setCode2($code2)
    {
        $this->code2 = $code2;

        return $this;
    }

    /**
     * Get code2
     *
     * @return string 
     */
    public function getCode2()
    {
        return $this->code2;
    }

    /**
     * Add fcode
     *
     * @param City $fcode
     * @return Country
     */
    public function addFcode(City $fcode)
    {
        $this->fcode[] = $fcode;

        return $this;
    }

    /**
     * Remove fcode
     *
     * @param City $fcode
     */
    public function removeFcode(City $fcode)
    {
        $this->fcode->removeElement($fcode);
    }

    /**
     * Get fcode
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFcode()
    {
        return $this->fcode;
    }

    /**
     * Add cityCode
     *
     * @param City $cityCode
     * @return Country
     */
    public function addCityCode(City $cityCode)
    {
        $this->cityCode[] = $cityCode;

        return $this;
    }

    /**
     * Remove cityCode
     *
     * @param City $cityCode
     */
    public function removeCityCode(City $cityCode)
    {
        $this->cityCode->removeElement($cityCode);
    }

    /**
     * Get cityCode
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * Add countryLanguageCode
     *
     * @param CountryLanguage $countryLanguageCode
     * @return Country
     */
    public function addCountryLanguageCode(CountryLanguage $countryLanguageCode)
    {
        $this->countryLanguageCode[] = $countryLanguageCode;

        return $this;
    }

    /**
     * Remove countryLanguageCode
     *
     * @param CountryLanguage $countryLanguageCode
     */
    public function removeCountryLanguageCode(CountryLanguage $countryLanguageCode)
    {
        $this->countryLanguageCode->removeElement($countryLanguageCode);
    }

    /**
     * Get countryLanguageCode
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCountryLanguageCode()
    {
        return $this->countryLanguageCode;
    }
}
