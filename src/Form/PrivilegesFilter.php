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
use Zend\Validator\NotEmpty;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class PrivilegesFilter extends AbstractFilter
{

    /**
     * construct do Table
     *
     * @return  \Auth\Form\PrivilegesFilter
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
                    //############################################ informações da coluna role_id ##############################################:
                     $this->add([
                    'name' => 'role_id',
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
        
        //############################################ informações da coluna allowed ##############################################:
                     $this->add([
                    'name' => 'allowed',
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


                    //############################################ informações da coluna resource_id ##############################################:
                     $this->add([
                    'name' => 'resource_id',
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
        
        
        $this->setDescription([]);
        $this->setAccess([]);
        $this->setState([]);
        $this->setModified([]);
        $this->setCreated([]);
    }


}

