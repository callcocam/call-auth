<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Form;

use Auth\Model\Roles\RolesRepository;
use Base\Form\AbstractForm;
use Interop\Container\ContainerInterface;
use Auth\Form\UsersFilter;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class UpdatePasswordForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return \Auth\Form\UpdatePasswordForm
     * @param ContainerInterface $containerInterface
     * @param string $name
     * @param array $options
     */
    public function __construct(ContainerInterface $containerInterface, $name = 'Users', array $options = array())
    {
        // Configurações iniciais do Form;
        parent::__construct($containerInterface, $name, $options);
        $this->setAttribute("id","Manager");
        $this->setInputFilter($containerInterface->get(UpdatePasswordFilter::class));
        $this->setId([]);

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

        $this->setCsrf([]);
        $this->setSave([]);
    }
}