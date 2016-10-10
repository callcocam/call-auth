<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 29/08/2016
 * Time: 17:56
 */

namespace Auth\Form\Factory;


use Auth\Form\UpdatePasswordForm;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class UpdatePasswordFormFactory implements FactoryInterface {

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
        return new UpdatePasswordForm($container);
    }
}