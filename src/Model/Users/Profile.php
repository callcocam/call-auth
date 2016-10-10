<?php
/*!
* This file is part of the HybridAuth PHP Library (hybridauth.sourceforge.net | github.com/hybridauth/hybridauth)
*
* This branch contains work in progress toward the next HybridAuth 3 release and may be unstable.
*/

namespace Auth\Model\Users;
use Zend\Hydrator\ArraySerializable;
use Zend\Hydrator\ClassMethods;
use Zend\Stdlib\ArrayObject;

/**
 * Model class representing a user profile.
 *
 * http://hybridauth.sourceforge.net/userguide/Profile_Data_User_Profile.html
 */
class Profile
{
    /* User website, blog, web page */
    protected $webSiteURL = null;

    /* URL link to profile page on the IDp web site */
    protected $profileURL = null;

    /* URL link to user photo or avatar */
    protected $photoURL = null;

    /* User dispalyName provided by the IDp or a concatenation of first and last name. */
    protected $displayName = null;

    /* A short about_me */
    protected $description = null;

    /* User's first name */
    protected $firstName = null;

    /* User's last name */
    protected $lastName = null;

    /* male or female */
    protected $gender = null;

    /* language */
    protected $language = null;

    /* User age, we dont calculate it. we return it as is if the IDp provide it. */
    protected $age = null;

    /* User birth Day */
    protected $birthDay = null;

    /* User birth Month */
    protected $birthMonth = null;

    /* User birth Year */
    protected $birthYear = null;

    /* User email. Note: not all of IDp garant access to the user email */
    protected $email = null;

    /* Verified user email. Note: not all of IDp garant access to verified user email */
    protected $emailVerified = null;

    /* phone number */
    protected $phone = null;

    /* complete user address */
    protected $address = null;

    /* user country */
    protected $country = null;

    /* region */
    protected $region = null;

    /* city */
    protected $city = null;

    /* Postal code  */
    protected $zip = null;

    // --------------------------------------------------------------------

    /**
     * For lazy ppl like me
     */
    function __toString()
    {
        return json_encode( get_class_vars( __CLASS__ ) ) ;
    }

    // --------------------------------------------------------------------

    public function factory($options)
    {
        // or, if the object has data we want as an array:
        $hidrator=new ClassMethods();
        $hidrator->hydrate((array)$options,$this);
    }

    public function toArray()
    {
        $hidrator=new ClassMethods();
        return $hidrator->extract($this);
    }

    /**
     * @return null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param null $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return null
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param null $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return null
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * @param null $birthDay
     */
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;
    }

    /**
     * @return null
     */
    public function getBirthMonth()
    {
        return $this->birthMonth;
    }

    /**
     * @param null $birthMonth
     */
    public function setBirthMonth($birthMonth)
    {
        $this->birthMonth = $birthMonth;
    }

    /**
     * @return null
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * @param null $birthYear
     */
    public function setBirthYear($birthYear)
    {
        $this->birthYear = $birthYear;
    }

    /**
     * @return null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param null $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param null $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return null
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param null $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return null
     */
    public function getEmailVerified()
    {
        return $this->emailVerified;
    }

    /**
     * @param null $emailVerified
     */
    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified;
    }

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param null $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return null
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param null $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param null $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param null $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param null $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return null
     */
    public function getPhotoURL()
    {
        return $this->photoURL;
    }

    /**
     * @param null $photoURL
     */
    public function setPhotoURL($photoURL)
    {
        $this->photoURL = $photoURL;
    }

    /**
     * @return null
     */
    public function getProfileURL()
    {
        return $this->profileURL;
    }

    /**
     * @param null $profileURL
     */
    public function setProfileURL($profileURL)
    {
        $this->profileURL = $profileURL;
    }

    /**
     * @return null
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param null $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return null
     */
    public function getWebSiteURL()
    {
        return $this->webSiteURL;
    }

    /**
     * @param null $webSiteURL
     */
    public function setWebSiteURL($webSiteURL)
    {
        $this->webSiteURL = $webSiteURL;
    }

    /**
     * @return null
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param null $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }


}
