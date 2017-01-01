<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-action for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-action/blob/master/LICENSE.md
 */
namespace Pacificnm\Action\Entity;

use Pacificnm\Controller\Entity\Entity as ControllerEntity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $actionId;

    /**
     *
     * @var number
     */
    protected $controllerId;

    /**
     *
     * @var string
     */
    protected $actionName;

    /**
     *
     * @var ControllerEntity
     */
    protected $controllerEntity;

    /**
     *
     * @return the $actionId
     */
    public function getActionId()
    {
        return $this->actionId;
    }

    /**
     *
     * @return the $controllerId
     */
    public function getControllerId()
    {
        return $this->controllerId;
    }

    /**
     *
     * @return the $actionName
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     *
     * @return the $controllerEntity
     */
    public function getControllerEntity()
    {
        return $this->controllerEntity;
    }

    /**
     *
     * @param number $actionId            
     */
    public function setActionId($actionId)
    {
        $this->actionId = $actionId;
    }

    /**
     *
     * @param number $controllerId            
     */
    public function setControllerId($controllerId)
    {
        $this->controllerId = $controllerId;
    }

    /**
     *
     * @param string $actionName            
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
    }

    /**
     *
     * @param \Controller\Entity\Entity $controllerEntity            
     */
    public function setControllerEntity($controllerEntity)
    {
        $this->controllerEntity = $controllerEntity;
    }
}

