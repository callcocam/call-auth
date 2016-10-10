<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 29/08/2016
 * Time: 15:53
 */

namespace Auth\Form\Factory;


use Auth\Form\ProfileForm;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ProfileFormFactory implements FactoryInterface
{

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
        return new ProfileForm($container);
    }
}