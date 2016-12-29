<?php

namespace Action\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Action\Form\Form;

class FormFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Action\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }


}

