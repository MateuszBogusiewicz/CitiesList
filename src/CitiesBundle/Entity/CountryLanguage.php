<?php

namespace CitiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * CountryLanguage
 *
 * @ORM\Table(name="country_language")
 * @ORM\Entity(repositoryClass="CitiesBundle\Repository\CountryLanguageRepository")
 */
class CountryLanguage
{
    
    const OFFICIAL_TRUE = 'T';
    const OFFICIAL_FALSE = 'F';
    /**
     * @var string
     *
     * @ORM\Column(name="CountryCode", type="string", length=3)
     * @ORM\Id
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=30)
     * @ORM\Id
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="IsOfficial", type="string", length=255)
     */
    private $isOfficial;

    /**
     * @var float
     *
     * @ORM\Column(name="Percentage", type="float")
     */
    private $percentage;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="countryLanguageCode")
     * @ORM\JoinColumn(name="countryCode", referencedColumnName="Code")
     */
    private $countryLanguageFKey;
    

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
     * Set countryCode
     *
     * @param string $countryCode
     * @return CountryLanguage
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
     * Set language
     *
     * @param string $language
     * @return CountryLanguage
     */
    public function setLanguage($language)
    {
        if (!in_array($language, array(self::OFFICIAL_TRUE, self::OFFICIAL_FALSE))) {
            throw new \InvalidArgumentException("Invalid language");
        }
        
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set isOfficial
     *
     * @param string $isOfficial
     * @return CountryLanguage
     */
    public function setIsOfficial($isOfficial)
    {
        $this->isOfficial = $isOfficial;

        return $this;
    }

    /**
     * Get isOfficial
     *
     * @return string 
     */
    public function getIsOfficial()
    {
        return $this->isOfficial;
    }

    /**
     * Set percentage
     *
     * @param float $percentage
     * @return CountryLanguage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return float 
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set countryLanguageFKey
     *
     * @param Country $countryLanguageFKey
     * @return CountryLanguage
     */
    public function setCountryLanguageFKey(Country $countryLanguageFKey = null)
    {
        $this->countryLanguageFKey = $countryLanguageFKey;

        return $this;
    }

    /**
     * Get countryLanguageFKey
     *
     * @return Country
     */
    public function getCountryLanguageFKey()
    {
        return $this->countryLanguageFKey;
    }
}
