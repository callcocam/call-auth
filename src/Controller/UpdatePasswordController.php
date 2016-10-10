<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Controller;

use Auth\Form\UpdatePasswordFilter;
use Auth\Form\UpdatePasswordForm;
use Base\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Auth\Model\Users\Users;
use Auth\Model\Users\UsersRepository;
use Zend\Debug\Debug;
use Zend\View\Model\JsonModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class UpdatePasswordController extends AbstractController
{

    /**
     * __construct Factory Model
     *
     * @param ContainerInterface $containerInterface
     * @return \Auth\Controller\UpdatePasswordController
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        // Configurações iniciais do Controller
        $this->containerInterface=$containerInterface;
        $this->table=UsersRepository::class;
        $this->model=Users::class;
        $this->form=UpdatePasswordForm::class;
        $this->filter=UpdatePasswordFilter::class;
        $this->route="auth";
        $this->controller="update-password";
    }

    public function updatepasswordAction(){
        if(!$this->IdentityManager->hasIdentity()){
            $this->Messages()->flashError("AUTENTICAÇÃO FALHOU, VOCÊ NÃO TEM PERMISSÃO!");
            return $this->redirect()->toRoute($this->route);
        }
        if($this->getData()){
            $this->data['email']=$this->user->email;
            $this->prepareData($this->data);
            $result = $this->getTable()->changePassword($this->data['id'], $this->data['password']);
            $view=new JsonModel($this->getTable()->getData()->toArray());
            return $view;

        }
        $this->tplEditar="update-password";
        $this->form=$this->getForm();
        $this->form->setData((array)$this->user);
        $view=$this->getView($this->data);
        $view->setVariable('form',$this->form);
        $view->setTemplate('auth/auth/update-password');
        return $view;
    }



}

