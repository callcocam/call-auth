<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Controller;

use Base\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Auth\Form\RolesFilter;
use Auth\Form\RolesForm;
use Auth\Model\Roles\Roles;
use Auth\Model\Roles\RolesRepository;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class RolesController extends AbstractController
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
        $this->table=RolesRepository::class;
        $this->model=Roles::class;
        $this->form=RolesForm::class;
        $this->filter=RolesFilter::class;
        $this->route="auth";
        $this->controller="roles";
    }


}

