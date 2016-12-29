<?php

namespace Action\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Action\Controller\ConsoleController;

class ConsoleControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Action\Controller\ConsoleContorller
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $service = $realServiceLocator->get('Action\Service\ServiceInterface');
        $console = $realServiceLocator->get('console');
        return new ConsoleController($service, $console);
    }


}

