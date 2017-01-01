<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-action for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-action/blob/master/LICENSE.md
 */
namespace Pacificnm\Action\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\Action\Service\ServiceInterface;
use Pacificnm\Action\Form\Form;

class UpdateController extends AbstractApplicationController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var Form
     */
    protected $form;

    /**
     *
     * @param ServiceInterface $service            
     * @param Form $form            
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;
        
        $this->form = $form;
    }

    /**
     *
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
        
        if (! $entity) {
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
                    'authId' => $this->identity()
                        ->getAuthId(),
                    'requestUrl' => $this->getRequest()
                        ->getUri(),
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

