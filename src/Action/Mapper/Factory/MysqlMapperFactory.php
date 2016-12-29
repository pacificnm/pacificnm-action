<?php

namespace Action\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Action\Hydrator\Hydrator;
use Action\Entity\Entity;
use Action\Mapper\MysqlMapper;

class MysqlMapperFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Action\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
                    
        $hydrator->add(new Hydrator());  
                    
        $prototype = new Entity();
                    
        $writeAdapter = $serviceLocator->get('db1');
                    
        $readAdapter = $serviceLocator->get('db2');
                    
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }


}
