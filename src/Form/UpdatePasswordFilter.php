<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Form;

use Base\Form\AbstractFilter;
use Interop\Container\ContainerInterface;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Validator\Identical;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class UpdatePasswordFilter extends AbstractFilter
{

    /**
     * construct do Table
     *
     * @return \Auth\Form\UpdatePasswordFilter
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        // Configurações iniciais do Form
        parent::__construct($containerInterface);
        $this->setId([]);


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
            'required' => true,
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

    }


}

