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

class IndexController extends AbstractApplicationController
{

    /**
     * 
     * @var ServiceInterface
     */
    protected $service;

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

        $this->getEventManager()->trigger('actionIndex', $this, array(
        	'authId' => $this->identity()->getAuthId(),
        	'requestUrl' => $this->getRequest()->getUri()
        ));

        $filter = array(
        	'page' => $this->page,
        	'count-per-page' => $this->countPerPage
        );

        $paginator = $this->service->getAll($filter);

        $paginator->setCurrentPageNumber($filter['page']);

        $paginator->setItemCountPerPage($filter['count-per-page']);

        return new ViewModel(array(
        	'paginator' => $paginator,
        	'page' => $filter['page'],
        	'count-per-page' => $filter['count-per-page'],
        	'itemCount' => $paginator->getTotalItemCount(),
        	'pageCount' => $paginator->count(),
        	'queryParams' => $this->params()->fromQuery(),
        	'routeParams' => $this->params()->fromRoute()
        ));
    }


}

