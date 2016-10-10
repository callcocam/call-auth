<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Model\Roles;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class Roles extends AbstractModel
{

    protected $parent_id = null;

    protected $is_admin = '0';

    protected $title = '';

    /**
     * get parent_id
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * get is_admin
     *
     * @return int
     */
    public function getIsAdmin()
    {
        return $this->is_admin;
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
     * set parent_id
     *
     * @return int
     */
    public function setParentId($parent_id = null)
    {
        $this->parent_id=$parent_id;
        return $this;
    }

    /**
     * set is_admin
     *
     * @return int
     */
    public function setIsAdmin($is_admin = '0')
    {
        $this->is_admin=$is_admin;
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

