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

class ViewController extends AbstractApplicationController
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
            $this->flashMessenger()->addErrorMessage('Object was not found');
            return $this->redirect()->toRoute('action-index');
        }
        
        $this->getEventManager()->trigger('actionView', $this, array(
            'authId' => $this->identity()
                ->getAuthId(),
            'requestUrl' => $this->getRequest()
                ->getUri(),
            'actionEntity' => $entity
        ));
        
        return new ViewModel(array(
            'entity' => $entity
        ));
    }
}

