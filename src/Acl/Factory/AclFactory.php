<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 22:25
 */

namespace Auth\Acl\Factory;


use Auth\Acl\Acl;
use Auth\Acl\Privileges;
use Auth\Acl\Resources;
use Auth\Acl\Roles;
use Auth\Model\Privileges\PrivilegesRepository;
use Auth\Model\Resources\ResourcesRepository;
use Auth\Model\Roles\RolesRepository;
use Auth\Storage\IdentityManager;
use Interop\Container\ContainerInterface;
use Zend\Debug\Debug;
use Zend\ServiceManager\Factory\FactoryInterface;

class AclFactory implements FactoryInterface {

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
        $controllers = $container->get('Config');
        $roles=new Roles($container->get(RolesRepository::class));
        $resources=new Resources($container->get(ResourcesRepository::class),$controllers['controllers']);
        $privileges=new Privileges($container->get(PrivilegesRepository::class));
        return new Acl($container->get(IdentityManager::class),$roles,$resources,$privileges);
    }
}