<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 29/08/2016
 * Time: 18:22
 */

namespace Auth\Controller\Factory;


use Auth\Controller\UpdatePasswordController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class UpdatePasswordControllerFactory implements FactoryInterface{

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
        return new UpdatePasswordController($container);
    }
}