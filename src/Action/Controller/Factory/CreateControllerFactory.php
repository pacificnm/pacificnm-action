<?php

namespace Action\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Action\Controller\CreateController;

class CreateControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Action\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Action\Service\ServiceInterface');

        $form = $realServiceLocator->get('Action\Form\Form');

        return new CreateController($service, $form);
    }


}

