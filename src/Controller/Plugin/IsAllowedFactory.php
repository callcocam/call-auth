<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 09/09/2016
 * Time: 11:21
 */

namespace Auth\Controller\Plugin;


use Auth\Acl\Acl;
use Auth\Storage\IdentityManager;
use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\FactoryInterface;

class IsAllowedFactory implements FactoryInterface{

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

        $auth = $container->get(IdentityManager::class);
        $acl = $container->get(Acl::class);
        return new IsAllowed($auth, $acl);
    }
}