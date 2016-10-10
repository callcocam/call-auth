<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Form;

use Base\Form\AbstractForm;
use Interop\Container\ContainerInterface;
use Auth\Form\RolesFilter;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class RolesForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return  \Auth\Form\RolesForm
     * @param ContainerInterface $containerInterface
     * @param string $name
     * @param array $options
     */
    public function __construct(ContainerInterface $containerInterface, $name = 'Roles', array $options = array())
    {
        // Configurações iniciais do Form;
        parent::__construct($containerInterface, $name, $options);
        $this->setAttribute("id","Manager");
        $this->setInputFilter($containerInterface->get(RolesFilter::class));
        $this->setId([]);
        $this->setAssetid([]);
        $this->setCodigo([]);
        $this->setEmpresa([]);
                    //############################################ informações da coluna parent_id ##############################################:
        		    $this->add([
        	                   'type' => 'text',//hidden, select, radio, checkbox, textarea
        	                    'name' => 'parent_id',
        	                    'options' => [
                     	'label' => 'FILD_PARENT_ID_LABEL',
                    	//'value_options'      =>[],
        				//'disable_inarray_validator' => true,
        				//'label_attributes'=>['class'=>'control-label','for'=>'PARENT_ID'],
        				//'add-on-append'=>'aws-font'
         ],
        	                    'attributes' => [
                'id'=>'parent_id',
                'class' =>'form-control',
                'title' => 'FILD_PARENT_ID_DESC',
                'placeholder' => 'FILD_PARENT_ID_PLACEHOLDER',
                'data-access' => '3',
                'data-position' => 'geral',
                //'readonly' => true/false,
                //'requerid' => true/false,
            	        	        ],
        	               ]
        	            );
        
        
                    //############################################ informações da coluna is_admin ##############################################:
        		    $this->add([
        	                   'type' => 'text',//hidden, select, radio, checkbox, textarea
        	                    'name' => 'is_admin',
        	                    'options' => [
                     	'label' => 'FILD_IS_ADMIN_LABEL',
                    	//'value_options'      =>[],
        				//'disable_inarray_validator' => true,
        				//'label_attributes'=>['class'=>'control-label','for'=>'IS_ADMIN'],
        				//'add-on-append'=>'aws-font'
         ],
        	                    'attributes' => [
                'id'=>'is_admin',
                'class' =>'form-control',
                'title' => 'FILD_IS_ADMIN_DESC',
                'placeholder' => 'FILD_IS_ADMIN_PLACEHOLDER',
                'data-access' => '3',
                'data-position' => 'geral',
                //'readonly' => true/false,
                //'requerid' => true/false,
            	        	        ],
        	               ]
        	            );
        
        
                    //############################################ informações da coluna title ##############################################:
        		    $this->add([
        	                   'type' => 'text',//hidden, select, radio, checkbox, textarea
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
                'data-access' => '3',
                'data-position' => 'geral',
                //'readonly' => true/false,
                //'requerid' => true/false,
            	        	        ],
        	               ]
        	            );
        
        
        $this->setDescription([]);
        $this->setAccess([]);
        $this->setState([]);
        $this->setCreated([]);
        $this->setModified(["type" => "hidden"]);
        $this->setCsrf([]);
        $this->setSave([]);
    }


}

