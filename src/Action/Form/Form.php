<?php

namespace Action\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Action\Entity\Entity;
use Action\Hydrator\Hydrator;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     * @param string $name
     * @param array $options
     */
    public function __construct($name = 'action-form', $options = array())
    {
        parent::__construct($name, $options);

        $this->setHydrator(new Hydrator(false));

        $this->setObject(new Entity());
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
    }

    /**
     * {@inheritdoc}
     *
     * @see
     * \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array();
    }


}

