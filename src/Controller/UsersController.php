<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Controller;

use Base\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Auth\Form\UsersFilter;
use Auth\Form\UsersForm;
use Auth\Model\Users\Users;
use Auth\Model\Users\UsersRepository;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class UsersController extends AbstractController
{

    /**
     * __construct Factory Model
     *
     * @param ContainerInterface $containerInterface
     * @return \Auth\Controller\UsersController
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        // Configurações iniciais do Controller
        $this->containerInterface=$containerInterface;
        $this->table=UsersRepository::class;
        $this->model=Users::class;
        $this->form=UsersForm::class;
        $this->filter=UsersFilter::class;
        $this->route="auth";
        $this->controller="users";
    }

    public function finalizarAction()
    {
        $this->getData();
        $this->prepareData($this->data);
        return parent::finalizarAction();
    }


}

