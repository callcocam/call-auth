<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Model\Resources;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class Resources extends AbstractModel
{

    protected $title = '';

    protected $alias = 'admin_controller_admincontroller';

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
     * get alias
     *
     * @return varchar
     */
    public function getAlias()
    {
        return $this->alias;
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

    /**
     * set alias
     *
     * @return varchar
     */
    public function setAlias($alias = 'admin_controller_admincontroller')
    {
        $this->alias=$alias;
        return $this;
    }


}

