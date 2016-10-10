<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Model\Privileges;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class Privileges extends AbstractModel
{

    protected $allowed;

    protected $role_id = '0';

    protected $resource_id = null;

    protected $title = '';

    /**
     * @return mixed
     */
    public function getAllowed()
    {
        return $this->allowed;
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
     * get resource_id
     *
     * @return int
     */
    public function getResourceId()
    {
        return $this->resource_id;
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
     * @param mixed $allowed
     */
    public function setAllowed($allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * set role_id
     *
     * @return int
     */
    public function setRoleId($role_id = '0')
    {
        $this->role_id=$role_id;
        return $this;
    }

    /**
     * set resource_id
     *
     * @return int
     */
    public function setResourceId($resource_id = null)
    {
        $this->resource_id=$resource_id;
        return $this;
    }

    /**
     * set title
     *
     * @return varchar
     */
    public function setTitle($title = '')
    {
        $this->title=$title;
        return $this;
    }


}

