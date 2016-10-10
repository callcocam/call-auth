<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Form;

use Auth\Model\Resources\ResourcesRepository;
use Auth\Model\Roles\RolesRepository;
use Base\Form\AbstractForm;
use Interop\Container\ContainerInterface;
use Auth\Form\PrivilegesFilter;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class PrivilegesForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return  \Auth\Form\PrivilegesForm
     * @param ContainerInterface $containerInterface
     * @param string $name
     * @param array $options
     */
    public function __construct(ContainerInterface $containerInterface, $name = 'Privileges', array $options = array())
    {
        // Configurações iniciais do Form;
        parent::__construct($containerInterface, $name, $options);
        $this->setAttribute("id","Manager");
        $this->setInputFilter($containerInterface->get(PrivilegesFilter::class));
        $this->setId([]);
        $this->setAssetid([]);
        $this->setCodigo([]);
        $this->setEmpresa([]);
        //############################################ informações da coluna role_id ##############################################:
        $this->add([
                'type' => 'select',//hidden, select, radio, checkbox, textarea
                'name' => 'role_id',
                'options' => [
                    'label' => 'FILD_ROLE_ID_LABEL',
                    'value_options'      =>$this->setValueOption(RolesRepository::class,['state'=>'0']),
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'ROLE_ID'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'role_id',
                    'class' =>'form-control privileges select',
                    'title' => 'FILD_ROLE_ID_DESC',
                    'placeholder' => 'FILD_ROLE_ID_PLACEHOLDER',
                    'data-access' => '3',
                    'data-position' => 'geral',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                ],
            ]
        );

 //############################################ informações da coluna allowed ##############################################:
        $this->add([
                'type' => 'select',//hidden, select, radio, checkbox, textarea
                'name' => 'allowed',
                'options' => [
                    'label' => 'FILD_ALLOWED_LABEL',
                    'value_options'      =>['allow'=>"PERMITIR",'deny'=>"NEGAR"],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'ROLE_ID'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'allowed',
                    'class' =>'form-control privileges select',
                    'title' => 'FILD_ALLOWED_DESC',
                    'placeholder' => 'FILD_ALLOWED_PLACEHOLDER',
                    'data-access' => '3',
                    'data-position' => 'geral',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                ],
            ]
        );


        //############################################ informações da coluna resource_id ##############################################:
        $this->add([
                'type' => 'select',//hidden, select, radio, checkbox, textarea
                'name' => 'resource_id',
                'options' => [
                    'label' => 'FILD_RESOURCE_ID_LABEL',
                    'value_options'      =>$this->setValueOption(ResourcesRepository::class),
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'RESOURCE_ID'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'resource_id',
                    'class' =>'form-control privileges select',
                    'title' => 'FILD_RESOURCE_ID_DESC',
                    'placeholder' => 'FILD_RESOURCE_ID_PLACEHOLDER',
                    'data-access' => '3',
                    'data-position' => 'geral',
                    //'readonly' => true/false,
                    //'requerid' => true/false,
                ],
            ]
        );


        //############################################ informações da coluna title ##############################################:
        $this->add([
                'type' => 'select',//hidden, select, radio, checkbox, textarea
                'name' => 'title',
                'options' => [
                    'label' => 'FILD_TITLE_LABEL',
                    'value_options'      =>[''=>'','delete'=>"Deletar/Excluir",'create'=>'-Cadastrar/Novo','update'=>'--Alterar/Editar','index'=>'---Listar/Pagina Incial'],
                    //'disable_inarray_validator' => true,
                    //'label_attributes'=>['class'=>'control-label','for'=>'TITLE'],
                    //'add-on-append'=>'aws-font'
                ],
                'attributes' => [
                    'id'=>'title',
                    'class' =>'form-control privileges select',
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
        $this->setSaveCopy([]);
    }
}