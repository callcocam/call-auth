<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 06/09/2016
 * Time: 14:27
 */

namespace Auth\Model\Users\Factory;


use Auth\Model\Users\Profile;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class UserWrapperFactory implements FactoryInterface{

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
       return new Profile();
    }
}