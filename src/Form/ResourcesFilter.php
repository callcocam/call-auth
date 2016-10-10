<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Form;

use Base\Form\AbstractFilter;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Validator\Db\NoRecordExists;
use Zend\Validator\NotEmpty;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class ResourcesFilter extends AbstractFilter
{

    /**
     * construct do Table
     *
     * @return \Auth\Form\ResourcesFilter
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        // Configurações iniciais do Form
        parent::__construct($containerInterface);
        $this->setId([]);
        $this->setAssetid([]);
        $this->setCodigo([]);
        $this->setEmpresa([]);
                    //############################################ informações da coluna title ##############################################:
                     $this->add([
                    'name' => 'title',
                    'required' => true,
                    'filters' => [
                        ['name' => StripTags::class],
                        ['name' => StringTrim::class],
                    ],
                    'validators' => [
                        [
                            'name' => NotEmpty::class,
                            'options' => [
                                'messages' => [NotEmpty::IS_EMPTY => "Campo Obrigatorio"]
                            ],
                        ],
                    ],
                ]);


        if(isset($this->data['id']) && !empty($this->data['id']) && (int)$this->data['id']):
            $this->setExclude(['field'=>'id','value'=>$this->data['id']]);
        endif;

        //############################################ informações da coluna alias ##############################################:
        $this->add($this->factory->createInput([
            'name' => 'alias',
            'required' => true,
            'validators' => [
                [
                    'name' => '\Zend\Validator\Db\NoRecordExists',
                    'options' => [
                        'table' => 'bs_resources',
                        'field' => 'alias',
                        'adapter' => $this->containerInterface->get(AdapterInterface::class),
                        'exclude' => $this->getExclude(),
                        'messages' =>[
                            NoRecordExists::ERROR_RECORD_FOUND => 'Resourses Ja Existe!',
                            NoRecordExists::ERROR_NO_RECORD_FOUND => 'Resourses Ja Existe!',
                        ],
                    ],
                ],
                [
                    'name'=>NotEmpty::class,
                    'options'=>[
                        'messages'=>[NotEmpty::IS_EMPTY=>"Campo Obrigatorio"],
                    ]
                ],


            ],
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ]

        ]));
        
        $this->setDescription([]);
        $this->setAccess([]);
        $this->setState([]);
        $this->setModified([]);
        $this->setCreated([]);
    }


}

