<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Model\Users;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class Users extends AbstractModel
{

    protected $identifier = null;

    protected $title = null;

    protected $url = null;

    protected $cnpj = null;

    protected $gender = 'indefinido';

    protected $age = '0000';

    protected $birthDay = '00';

    protected $birthMonth = '00';

    protected $email = null;

    protected $phone = '';

    protected $username = null;

    protected $images = 'users_default.jpg';

    protected $password = null;

    protected $usr_registration_token = null;

    protected $role_id = '5';

    /**
     * get identifier
     *
     * @return varchar
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * get title
     *
     * @return varchar
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * get url
     *
     * @return varchar
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * get cnpj
     *
     * @return varchar
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * get gender
     *
     * @return varchar
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * get birthDay
     *
     * @return int
     */
    public function getBirthday()
    {
        return $this->birthDay;
    }

    /**
     * get birthMonth
     *
     * @return int
     */
    public function getBirthmonth()
    {
        return $this->birthMonth;
    }

    /**
     * get email
     *
     * @return varchar
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * get phone
     *
     * @return varchar
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * get username
     *
     * @return varchar
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * get images
     *
     * @return varchar
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * get password
     *
     * @return varchar
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * get usr_registration_token
     *
     * @return varchar
     */
    public function getUsrRegistrationToken()
    {
        return $this->usr_registration_token;
    }

    /**
     * get role_id
     *
     * @return int
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * set identifier
     *
     * @return varchar
     */
    public function setIdentifier($identifier = null)
    {
        $this->identifier=$identifier;
        return $this;
    }

    /**
     * set title
     *
     * @return varchar
     */
    public function setTitle($title = null)
    {
        $this->title=$title;
        return $this;
    }

    /**
     * set url
     *
     * @return varchar
     */
    public function setUrl($url = null)
    {
        $this->url=$url;
        return $this;
    }

    /**
     * set cnpj
     *
     * @return varchar
     */
    public function setCnpj($cnpj = null)
    {
        $this->cnpj=$cnpj;
        return $this;
    }

    /**
     * set gender
     *
     * @return varchar
     */
    public function setGender($gender = 'indefinido')
    {
        $this->gender=$gender;
        return $this;
    }

    /**
     * set age
     *
     * @return int
     */
    public function setAge($age = '0000')
    {
        $this->age=$age;
        return $this;
    }

    /**
     * set birthDay
     *
     * @return int
     */
    public function setBirthday($birthDay = '00')
    {
        $this->birthDay=$birthDay;
        return $this;
    }

    /**
     * set birthMonth
     *
     * @return int
     */
    public function setBirthmonth($birthMonth = '00')
    {
        $this->birthMonth=$birthMonth;
        return $this;
    }

    /**
     * set email
     *
     * @return varchar
     */
    public function setEmail($email = null)
    {
        $this->email=$email;
        return $this;
    }

    /**
     * set phone
     *
     * @return varchar
     */
    public function setPhone($phone = '')
    {
        $this->phone=$phone;
        return $this;
    }

    /**
     * set username
     *
     * @return varchar
     */
    public function setUsername($username = null)
    {
        $this->username=$username;
        return $this;
    }

    /**
     * set images
     *
     * @return varchar
     */
    public function setImages($images = 'users_default.jpg')
    {
        $this->images=$images;
        return $this;
    }

    /**
     * set password
     *
     * @return varchar
     */
    public function setPassword($password = null)
    {
        $this->password=$password;
        return $this;
    }

    /**
     * set usr_registration_token
     *
     * @return varchar
     */
    public function setUsrRegistrationToken($usr_registration_token = null)
    {
        $this->usr_registration_token=$usr_registration_token;
        return $this;
    }

    /**
     * set role_id
     *
     * @return int
     */
    public function setRoleId($role_id = '5')
    {
        $this->role_id=$role_id;
        return $this;
    }


}

