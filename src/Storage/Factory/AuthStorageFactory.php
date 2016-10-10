<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 10:55
 */

namespace Auth\Storage\Factory;


use Auth\Storage\AuthStorage;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthStorageFactory implements FactoryInterface {

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
        // Configure the instance with constructor parameters:
        $Myconfig=$container->get("ZfConfig");
        $storage = new AuthStorage($Myconfig->sessao);
        return $storage;
    }
}