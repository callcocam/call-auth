<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Controller;

use Base\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Auth\Form\PrivilegesFilter;
use Auth\Form\PrivilegesForm;
use Auth\Model\Privileges\Privileges;
use Auth\Model\Privileges\PrivilegesRepository;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class PrivilegesController extends AbstractController
{

    /**
     * __construct Factory Model
     *
     * @return __construct
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        // Configurações iniciais do Controller
        $this->containerInterface=$containerInterface;
        $this->table=PrivilegesRepository::class;
        $this->model=Privileges::class;
        $this->form=PrivilegesForm::class;
        $this->filter=PrivilegesFilter::class;
        $this->route="auth";
        $this->controller="privileges";
    }


}

