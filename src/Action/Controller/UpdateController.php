<?php

namespace Action\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Action\Service\ServiceInterface;
use Action\Form\Form;

class UpdateController extends AbstractApplicationController
{

    protected $service = null;

    protected $form = null;

    /**
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;

        $this->form = $form;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $request = $this->getRequest();

        $id = $this->params()->fromRoute('id');

        $entity = $this->service->get($id);

        if(! $entity) {
        	$this->flashMessenger()->addErrorMessage('Object was not found');
        	return $this->redirect()->toRoute('action-index');
        }

        if ($request->isPost()) {
        	$postData = $request->getPost();

        	$this->form->setData($postData);

        	if ($this->form->isValid()) {
        		$entity = $this->form->getData();

        		$actionEntity = $this->service->save($entity);

        		$this->getEventManager()->trigger('actionCreate', $this, array(
        			'authId' => $this->identity()->getAuthId(),
        			'requestUrl' => $this->getRequest()->getUri(),
        			'actionEntity' => $entity
        		));

        		$this->flashMessenger()->addSuccessMessage('Object was saved');

        		return $this->redirect()->toRoute('action-view', array(
        			'id' => $actionEntity->getActionId()
        		));
        	}
        }

        $this->form->bind($entity);

        return new ViewModel(array(
        	'form' => $this->form
        ));
    }


}

