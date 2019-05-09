<?php
namespace Gamification\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class UserTaskHistoryModel extends TableGateway
{
    private $dbAdapter;
    
    public function   __construct(){
        $this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
        $this->table = 'user_task_history';
        $this->featureSet = new Feature\FeatureSet();
        $this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
        $this->initialize();
    }

    //Se crea funcion 	que recibira arreglo
    public function  addUserTasktoHistory($data){
        //inserta el array desde el service
        $this->insert($data);
        return $data;
    }
    //
   
    
    public function getUserTaskHistoryById($id_user,$id_task){
         $sql = new Sql($this->dbAdapter);
         $select = $sql->select();
         $select->from($this->table)
         ->where(array('id_user' => $id_user, 'id_task' => $id_task));
         $selectString = $sql->getSqlStringForSqlObject($select);
         $execute      = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
         $result       = $execute->toArray();
         return $result;
    }
    

}