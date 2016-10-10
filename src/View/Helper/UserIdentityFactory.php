<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 09/09/2016
 * Time: 11:26
 */

namespace Auth\View\Helper;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class UserIdentityFactory implements FactoryInterface {

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
        return new UserIdentity($container);
    }
}