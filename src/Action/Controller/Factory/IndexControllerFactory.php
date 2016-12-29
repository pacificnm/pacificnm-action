<?php

namespace Action\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Action\Controller\IndexController;

class IndexControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Action\Controller\IndexController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Action\Service\ServiceInterface');

        return new IndexController($service);
    }


}

