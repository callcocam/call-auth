<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 05/09/2016
 * Time: 14:18
 */

namespace Auth\Storage\Factory;


use Auth\Storage\SocialAuth;
use Interop\Container\ContainerInterface;
use Zend\Debug\Debug;
use Zend\ServiceManager\Factory\FactoryInterface;

class SocialAuthFactory implements FactoryInterface{

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
       $config=$container->get('Config');

       return new SocialAuth($container,$config['social-auth']);
    }
}