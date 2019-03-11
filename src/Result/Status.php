<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 6-3-19
 * Time: 17:11
 */

namespace Paynl\IDIN\Result;


class Status extends Result
{
    /**
     * @return string
     */
    public function getReference()
    {
        return $this->data['data']['reference'];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->data['data']['id'];
    }

    /**
     * @return array
     */
    public function getNameData()
    {
        return $this->data['data']['name'];
    }

    /**
     * @return string
     */
    public function getPreferredLastName()
    {
        return $this->data['data']['name']['prefLastName'];
    }

    /**
     * @return string
     */
    public function getPreferredLastNamePrefix()
    {
        return $this->data['data']['name']['prefLastNamePrefix'];
    }

    /**
     * @return string
     */
    public function getLegalLastName()
    {
        return $this->data['data']['name']['legalLastName'];
    }

    /**
     * @return string
     */
    public function getLegalLastNamePrefix()
    {
        return $this->data['data']['name']['legalLastNamePrefix'];
    }

    /**
     * @return string
     */
    public function getPartnerLastName()
    {
        return $this->data['data']['name']['partnerLastName'];
    }

    /**
     * @return string
     */
    public function getPartnerLastNamePrefix()
    {
        return $this->data['data']['name']['partnerLastNamePrefix'];
    }

    /**
     * @return string
     */
    public function getInitials()
    {
        return $this->data['data']['name']['initials'];
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->data['data']['name']['firstName'];
    }

    /**
     * @return array
     */
    public function getAddressData()
    {
        return $this->data['data']['address'];
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->data['data']['address']['street'];
    }

    /**
     * @return int
     */
    public function getHouseNumber()
    {
        return $this->data['data']['address']['housNo'];
    }

    /**
     * @return string
     */
    public function getHouseNumberSuffix()
    {
        return $this->data['data']['address']['housNoSuf'];
    }

    /**
     * @return string
     */
    public function getAddressExtra()
    {
        return $this->data['data']['address']['addressExtra'];
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->data['data']['address']['postalCode'];
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->data['data']['address']['city'];
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->data['data']['address']['country'];
    }

    /**
     * @return string
     */
    public function getIntAddressLine()
    {
        return $this->data['data']['address']['intAddressLine'];
    }

    /**
     * @return bool
     */
    public function isEighteen()
    {
        return $this->data['data']['isEighteen']['is18OrOlder'] == "TRUE";
    }

    /**
     * @return string
     */
    public function dateOfBirth()
    {
        return $this->data['data']['dateOfBirth']['dateOfBirth'];
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->data['data']['gender']['gender'];
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->data['data']['phone']['phone'];
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->data['data']['email']['email'];
    }
}