<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 02/09/2016
 * Time: 18:55
 */

namespace Auth\Form\Factory;


use Auth\Form\RegisterForm;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class RegisterFormFactory implements FactoryInterface{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RegisterForm($container);
    }
}