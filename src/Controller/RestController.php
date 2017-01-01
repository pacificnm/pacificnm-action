<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-action for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-action/blob/master/LICENSE.md
 */
namespace Pacificnm\Action\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Pacificnm\Action\Service\ServiceInterface;

class RestController extends AbstractRestfulController
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
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::create()
     */
    public function create($data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::delete()
     */
    public function delete($id)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::deleteList()
     */
    public function deleteList($data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::get()
     */
    public function get($id)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::getList()
     */
    public function getList($params)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::head()
     */
    public function head($id)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::options()
     */
    public function options()
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::patch()
     */
    public function patch($id, $data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::replaceList()
     */
    public function replaceList($data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::patchList()
     */
    public function patchList($data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::update()
     */
    public function update($id, $data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::notFoundAction()
     */
    public function notFoundAction()
    {
        $this->response->setStatusCode(404);
        return array('content' => 'Page not found');
    }


}

