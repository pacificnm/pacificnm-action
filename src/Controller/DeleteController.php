<?php
namespace Pacificnm\Action\Controller;
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-action for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-action/blob/master/LICENSE.md
 */
use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\Action\Service\ServiceInterface;

class DeleteController extends AbstractApplicationController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @param ServiceInterface $service            
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
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
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashmessenger()->addErrorMessage('Object was not found.');
            return $this->redirect()->toRoute('action-index');
        }
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('delete_confirmation', 'no');
            if ($del === 'yes') {
                $this->service->delete($entity);
                
                $this->getEventManager()->trigger('actionDelete', $this, array(
                    'authId' => $this->identity()
                        ->getAuthId(),
                    'requestUrl' => $this->getRequest()
                        ->getUri(),
                    'actionEntity' => $entity
                ));
                
                $this->flashmessenger()->addSuccessMessage('Object was deleted');
                
                return $this->redirect()->toRoute('action-index');
            }
            
            return $this->redirect()->toRoute('action-view', array(
                'id' => $id
            ));
        }
        
        return new ViewModel(array(
            'entity' => $entity
        ));
    }
}

