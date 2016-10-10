<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Form;

use Base\Form\AbstractForm;
use Interop\Container\ContainerInterface;


/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class ProfileForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return \Auth\Form\ProfileForm
     * @param ContainerInterface $containerInterface
     * @param string $name
     * @param array $options
     */
    public function __construct(ContainerInterface $containerInterface, $name = 'Profile', array $options = array())
    {
        // Configurações iniciais do Form;
        parent::__construct($containerInterface, $name, $options);
        $this->setAttribute("id","Manager");
        $this->setInputFilter($containerInterface->get(ProfileFilter::class));
        $this->setId([]);
       $this->setAssetid([]);
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


        //############################################ informações da coluna gender ##############################################:
        $this->add([
                'type' => 'radio',//text,hidden, select, radio, checkbox, textarea
                'name' => 'gender',
                'options' => [
                    'label' => 'FILD_GENDER_LABEL',
                    'value_options'      =>['indefinido'=>'Indefinido','male'=>"Homem",'femele'=>"Mulher"],
                   // 'inline'      =>true,
                    //'disable_inarray_validator' => true,
                   'label_attributes'=>['class'=>'radio-inline radio-styled','for'=>'GENDER'],

                ],
                'attributes' => [
                    'id'=>'gender',
                   //'class' =>'radio-inline radio-styled',
                    'title' => 'FILD_GENDER_DESC',
                    'placeholder' => 'FILD_GENDER_PLACEHOLDER',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );


        //############################################ informações da coluna age ##############################################:
        $this->add([
                'type' => 'text',//text,hidden, select, radio, checkbox, textarea
                'name' => 'age',
                'options' => [
                    'label' => 'FILD_AGE_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'AGE'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'age',
                    'class' =>'form-control',
                    'title' => 'FILD_AGE_DESC',
                    'placeholder' => 'FILD_AGE_PLACEHOLDER',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );


        //############################################ informações da coluna birthDay ##############################################:
        $this->add([
                'type' => 'number',//text,hidden, select, radio, checkbox, textarea
                'name' => 'birthDay',
                'options' => [
                    'label' => 'FILD_BIRTHDAY_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'BIRTHDAY'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'birthDay',
                    'class' =>'form-control',
                    'title' => 'FILD_BIRTHDAY_DESC',
                    'placeholder' => 'FILD_BIRTHDAY_PLACEHOLDER',
                    'min' => '0',
                    'max' => '31',
                    'step' => '1', // default step interval is 1
                    'value' => '0',
                    'data-access' => '3',
                    'data-position' => 'geral',
                ],
            ]
        );


        //############################################ informações da coluna birthMonth ##############################################:
        $this->add([
                'type' => 'number',//text,hidden, select, radio, checkbox, textarea
                'name' => 'birthMonth',
                'options' => [
                    'label' => 'FILD_BIRTHMONTH_LABEL',
                    //'value_options'      =>[],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'BIRTHMONTH'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'birthMonth',
                    'class' =>'form-control',
                    'title' => 'FILD_BIRTHMONTH_DESC',
                    'placeholder' => 'FILD_BIRTHMONTH_PLACEHOLDER',
                    'min' => '0',
                    'max' => '12',
                    'value' => '0',
                    'step' => '1', // default step interval is 1
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
                    'readonly' => true,
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





        $this->setAtachament([]);
        $this->setDescription([]);
        $this->setModified(["type" => "hidden"]);
        $this->setCsrf([]);
        $this->setSave([]);

    }
}