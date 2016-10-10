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
class ForgothenPasswordForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return \Auth\Form\ForgothenPasswordForm
     * @param ContainerInterface $containerInterface
     * @param string $name
     * @param array $options
     */
    public function __construct(ContainerInterface $containerInterface, $name = 'Users', array $options = array())
    {
        // Configurações iniciais do Form;
        parent::__construct($containerInterface, $name, $options);
        $this->setAttribute("id","Manager");
        $this->setInputFilter($containerInterface->get(ForgothenPasswordFilter::class));
        //############################################ informações da coluna password ##############################################:
        $this->add([
                'type' => 'email',//text,hidden, select, radio, checkbox, textarea
                'name' => 'email',
                'options' => [
                    'label' => 'FILD_EMAIL_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'PASSWORD'],
                    'add-on-append'=>'unlock'
                ],
                'attributes' => [
                    'id'=>'email',
                    'class' =>'form-control',
                    'title' => 'FILD_EMAIL_DESC',
                    //'placeholder' => 'FILD_EMAIL_PLACEHOLDER',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );
        $this->setCsrf([]);
        $this->setSave([ 'name' => 'save',
            'type' => 'button',
            'attributes' => ['type' => 'submit','class'=>'btn btn-success btn-block'],
            'options' => [
                'label' => 'SOLICITAR NOVA SENHA?',
                'column-size' => 'sm-12',
                'add-on-append'=>'floppy-o'
            ]
        ]);
    }
}