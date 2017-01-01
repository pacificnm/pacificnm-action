<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-action for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-action/blob/master/LICENSE.md
 */
namespace Pacificnm\Action\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Application\Mapper\AbstractMysqlMapper;
use Pacificnm\Action\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     * Mysql Mapper Construct
     *
     * @param AdapterInterface $readAdapter
     * @param AdapterInterface $writeAdapter
     * @param HydratorInterface $hydrator
     * @param Entity $prototype
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
            
        $this->prototype = $prototype;
            
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Action\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll(array $filter)
    {
        $this->select = $this->readSql->select('action');
                    
        $this->filter($filter); 

        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {  
                return $this->getRows();    
            }
        }

        return $this->getPaginator();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Action\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('action');

        $this->select->where(array(
            'action.action_id = ?' => $id  
        ));
                    
        return $this->getRow();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Action\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
                    
        if ($entity->getActionId()) {
            $this->update = new Update('action'); 
                
            $this->update->set($postData);  
                
            $this->update->where(array(
                'action.action_id = ?' => $entity->getActionId()
            ));
                    
            $this->updateRow();            
        } else {
            $this->insert = new Insert('action'); 
                
            $this->insert->values($postData);
                
            $id = $this->createRow();
                
            $entity->setActionId($id);        
        }
                    
        return $this->get($entity->getActionId());
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Action\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('action');
        $this->delete->where(array(
             'action.action_id = ?' => $entity->getActionId()
        ));
                 
        return $this->deleteRow();
    }

    /**
     * Filters and search
     *
     * @param array $filter
     * @return \Pacificnm\Action\Mapper\MysqlMapper
     */
    protected function filter(array $filter)
    {
        return $this;
    }


}

