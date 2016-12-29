<?php

namespace Action\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Action\Controller\ViewController;

class ViewControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Action\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Action\Service\ServiceInterface');

        return new ViewController($service);
    }


}

