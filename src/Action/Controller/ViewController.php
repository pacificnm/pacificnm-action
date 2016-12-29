<?php

namespace Action\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Action\Service\ServiceInterface;

class ViewController extends AbstractApplicationController
{

    protected $service = null;

    /**
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $id = $this->params()->fromRoute('id');

        $entity = $this->service->get($id);

        if(! $entity) {
        	$this->flashMessenger()->addErrorMessage('Object was not found');
        	return $this->redirect()->toRoute('action-index');
        }

        $this->getEventManager()->trigger('actionView', $this, array(
        	'authId' => $this->identity()->getAuthId(),
        	'requestUrl' => $this->getRequest()->getUri(),
        	'actionEntity' => $entity
        ));

        return new ViewModel(array(
        	'entity' => $entity
        ));
    }


}

