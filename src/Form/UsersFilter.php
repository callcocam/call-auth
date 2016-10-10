<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Form;

use Base\Form\AbstractFilter;
use Base\Validator\Cnpj;
use Base\Validator\Cpf;
use Interop\Container\ContainerInterface;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Validator\NotEmpty;
use Zend\Validator\Db\NoRecordExists;
use Zend\Validator\EmailAddress;
use Zend\Validator\Identical;
use Zend\Validator\StringLength;
use Zend\Db\Adapter\AdapterInterface;
/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class UsersFilter extends AbstractFilter
{

    /**
     * construct do Table
     *
     * @return \Auth\Form\UsersFilter
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        // Configurações iniciais do Form
        parent::__construct($containerInterface);
        $this->setId([]);
       
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

        //############################################ informações da coluna cnpj ##############################################:
        $this->add($this->factory->createInput([
            'name' => 'cnpj',
            'required' => true,
            'validators' => [
                [
                    'name' => '\Zend\Validator\Db\NoRecordExists',
                    'options' => [
                        'table' => 'bs_users',
                        'field' => 'cnpj',
                        'adapter' => $this->containerInterface->get(AdapterInterface::class),
                        'exclude' => $this->getExclude(),
                        'messages' =>[
                            NoRecordExists::ERROR_RECORD_FOUND => 'Cnpj/Cpf Ja Existe!',
                            NoRecordExists::ERROR_NO_RECORD_FOUND => 'Cnpj/Cpf Ja Existe!',
                        ],
                    ],
                ],
                [
                    'name'=>NotEmpty::class,
                    'options'=>[
                        'messages'=>[NotEmpty::IS_EMPTY=>"Campo Obrigatorio"],
                    ]
                ],
                [
                    'name'=>Cpf::class,
                    'options'=>[
                        'messages'=>[Cpf::IS_EMPTY=>""],
                    ]
                ]

            ],
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ]

        ]));



       //############################################ informações da coluna email ##############################################:
        $this->add($this->factory->createInput([
            'name' => 'email',
            'required' => true,
            'validators' => [
                [
                    'name' => '\Zend\Validator\Db\NoRecordExists',
                    'options' => [
                        'table' => 'bs_users',
                        'field' => 'email',
                        'adapter' => $this->containerInterface->get(AdapterInterface::class),
                        'exclude' => $this->getExclude(),
                        'messages' =>[
                            NoRecordExists::ERROR_RECORD_FOUND => 'Email Ja Existe!',
                            NoRecordExists::ERROR_NO_RECORD_FOUND => 'Email Ja Existe!',
                        ],
                    ],
                ],
                [
                    'name'=>NotEmpty::class,
                    'options'=>[
                        'messages'=>[NotEmpty::IS_EMPTY=>"Campo Obrigatorio"],
                    ]
                ],
                [
                    'name'=>EmailAddress::class,
                    'options'=>[
                        'messages'=>[EmailAddress::INVALID_FORMAT=>"O Formato Do Email Não E valido"],
                    ]
                ]

            ],
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ]

        ]));


        //############################################ informações da coluna phone ##############################################:
        $this->add([
            'name' => 'phone',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
            ],
        ]);

 
        //############################################ informações da coluna images ##############################################:
        $this->add([
            'name' => 'images',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [ ],
        ]);

  
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

        //############################################ informações da coluna password ##############################################:
        $this->add([
            'name' => 'password',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 2,
                        'max' => 15,
                        'messages'=>[StringLength::TOO_LONG=>"Texto Muito Longo, Maximo:15",StringLength::TOO_SHORT=>"Texto Muito Curto, Minimo 5"]
                    ],
                ],
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages'=>[NotEmpty::IS_EMPTY=>"Campo Obrigatorio"]
                    ],
                ],
            ],
        ]);

        //############################################ informações da coluna usr_password_confirm ##############################################:
        $this->add([
            'name' => 'usr_password_confirm',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name'    => Identical::class,
                    'options' => [
                        'token' => 'password',
                        'messages'=>[
                            Identical::NOT_SAME=>"A Senha Não Corresponde Com A Confirmação"
                        ]
                    ],
                ],
            ],
        ]);


        //############################################ informações da coluna usr_registration_token ##############################################:
        $this->add([
            'name' => 'usr_registration_token',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [ ],
        ]);

        $this->setAtachament([]);
        $this->setDescription([]);
        $this->setAccess([]);
        $this->setState([]);
        $this->setModified([]);
        $this->setCreated([]);
    }


}

