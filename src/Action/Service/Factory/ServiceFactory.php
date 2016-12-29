<?php

namespace Action\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Action\Service\Service;

class ServiceFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Action\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Action\Mapper\MysqlMapperInterface');

        return new Service($mapper);
    }


}

