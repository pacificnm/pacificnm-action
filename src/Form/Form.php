<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-action for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-action/blob/master/LICENSE.md
 */
namespace Pacificnm\Action\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\Action\Entity\Entity;
use Pacificnm\Action\Hydrator\Hydrator;

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

