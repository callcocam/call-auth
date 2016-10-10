<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Form;

use Base\Form\AbstractForm;
use Interop\Container\ContainerInterface;
use Auth\Form\UsersFilter;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class UsersForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return  \Auth\Form\UsersForm
     * @param ContainerInterface $containerInterface
     * @param string $name
     * @param array $options
     */
    public function __construct(ContainerInterface $containerInterface, $name = 'Users', array $options = array())
    {
        // Configurações iniciais do Form;
        parent::__construct($containerInterface, $name, $options);
        $this->setAttribute("id","Manager");
       $this->setInputFilter($containerInterface->get(UsersFilter::class));
        $this->setId([]);
        $this->setAssetid([]);
        $this->setCodigo([]);
        $this->setEmpresa([]);
               
        //############################################ informações da coluna title ##############################################:
        $this->add([
                'type' => 'text',//text,hidden, select, radio, checkbox, textarea
                'name' => 'title',
                'options' => [
                    'label' => 'FILD_TITLE_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'TITLE'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'title',
                    'class' =>'form-control',
                    'title' => 'FILD_TITLE_DESC',
                    'placeholder' => 'FILD_TITLE_PLACEHOLDER',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );


        //############################################ informações da coluna cnpj ##############################################:
        $this->add([
                'type' => 'text',//text,hidden, select, radio, checkbox, textarea
                'name' => 'cnpj',
                'options' => [
                    'label' => 'FILD_CNPJ_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'CNPJ'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'cnpj',
                    'class' =>'form-control',
                    'title' => 'FILD_CNPJ_DESC',
                    'placeholder' => 'FILD_CNPJ_PLACEHOLDER',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );

        //############################################ informações da coluna email ##############################################:
        $this->add([
                'type' => 'text',//text,hidden, select, radio, checkbox, textarea
                'name' => 'email',
                'options' => [
                    'label' => 'FILD_EMAIL_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'EMAIL'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'email',
                    'class' =>'form-control',
                    'title' => 'FILD_EMAIL_DESC',
                    'placeholder' => 'FILD_EMAIL_PLACEHOLDER',
                    //'readonly' => true,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );


        //############################################ informações da coluna phone ##############################################:
        $this->add([
                'type' => 'text',//text,hidden, select, radio, checkbox, textarea
                'name' => 'phone',
                'options' => [
                    'label' => 'FILD_PHONE_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'PHONE'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'phone',
                    'class' =>'form-control',
                    'title' => 'FILD_PHONE_DESC',
                    'placeholder' => 'FILD_PHONE_PLACEHOLDER',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );


        //############################################ informações da coluna role_id ##############################################:
        $this->add([
                'type' => 'select',//text,hidden, select, radio, checkbox, textarea
                'name' => 'role_id',
                'options' => [
                    'label' => 'FILD_ROLE_ID_LABEL',
                    'value_options'      =>$this->setValueOption('Auth\Model\Roles\RolesRepository'),
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'ROLE_ID'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'role_id',
                    'class' =>'form-control',
                    'title' => 'FILD_ROLE_ID_DESC',
                    'placeholder' => 'FILD_ROLE_ID_PLACEHOLDER',
                   // 'readonly' => true,
                    'requerid' => true,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );

         //############################################ informações da coluna password ##############################################:
        $this->add([
                'type' => 'password',//text,hidden, select, radio, checkbox, textarea
                'name' => 'password',
                'options' => [
                    'label' => 'FILD_PASSWORD_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'PASSWORD'],
                    'add-on-append'=>'unlock'
                ],
                'attributes' => [
                    'id'=>'password',
                    'class' =>'form-control',
                    'title' => 'FILD_PASSWORD_DESC',
                    'placeholder' => 'FILD_PASSWORD_PLACEHOLDER',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );


       
 //############################################ informações da coluna role_id ##############################################:
        $this->add([
                'type' => 'password',//text,hidden, select, radio, checkbox, textarea
                'name' => 'usr_password_confirm',
                'options' => [
                    'label' => 'FILD_PASSWORD_CONFIRMA_LABEL',
                    //'label_attributes'=>['class'=>'control-label','for'=>'ROLE_ID'],
                   'add-on-append'=>'unlock'
                ],
                'attributes' => [
                    'id'=>'usr_password_confirm',
                    'class' =>'form-control',
                    'title' => 'FILD_PASSWORD_CONFIRMA_DESC',
                    'placeholder' => 'FILD_PASSWORD_CONFIRMA_PLACEHOLDER',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );
         //############################################ informações da coluna role_id ##############################################:
        $this->add([
                'type' => 'hidden',//text,hidden, select, radio, checkbox, textarea
                'name' => 'usr_registration_token',
                'options' => [
                    //'label' => 'FILD_PASSWORD_CONFIRMA_LABEL',
                    //'label_attributes'=>['class'=>'control-label','for'=>'ROLE_ID'],
                   //'add-on-append'=>'unlock'
                ],
                'attributes' => [
                    'id'=>'usr_registration_token',
                    'data-access' => '3',
                    'data-position' => 'geral',
                    'value'=>'active'
                ],
            ]
        );

        $this->setAtachament([]);
        $this->setDescription([]);
        $this->setAccess([]);
        $this->setState([]);
        $this->setCreated([]);
        $this->setModified(["type" => "hidden"]);
        $this->setCsrf([]);
        $this->setSave([]);
    }
}