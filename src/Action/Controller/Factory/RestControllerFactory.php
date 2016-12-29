<?php

namespace Action\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Action\Controller\RestController;

class RestControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Action\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Action\Service\ServiceInterface');

        return new RestController($service);
    }


}

