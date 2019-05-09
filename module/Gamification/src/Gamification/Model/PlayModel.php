<?php
namespace Gamification\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class PlayModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this-> table = 'usertask';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	
	//
	public function getTaskMadeByUser($id_user){
		$sql = new Sql($this->dbAdapter);
		$select = $sql->select();
		$select->from('usertask')
		->join('tasks', 'tasks.id = usertask.id')
		->where(array('Users_iduser' => $id_user));
	}

	public function getCategoryByUser($id_user){		
		$sql = new Sql($this->dbAdapter);
		$select = $sql->select();
		$select->from('usercategory')
		->join('categories', 'categories.id = usercategory.id_category')
		->where(array('id_category' => $id_user));
		$selectString = $sql->getSqlStringForSqlObject($select);
		 $execute      = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
        $result       = $execute->toArray();
	    //print_r($result);exit;
	    return $result;

	}

	public function getLevelsByUser($id_user){		
		$sql = new Sql($this->dbAdapter);
		$select = $sql->select();
		$select->from('users')
		->join('levels', 'levels.id = users.Levels_idLvl')
		->where(array('Levels_idLvl' => $id_user));
		$selectString = $sql->getSqlStringForSqlObject($select);
		 $execute      = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
        $result       = $execute->toArray();
	    //print_r($result);exit;
	    return $result;

	}
	
	
	public function getAchievmentsMadeByUser($id_user){
	    $sql = new Sql($this->dbAdapter);
	    $select = $sql->select();
	    $select->from('usertask')
	    ->join('tasks', 'tasks.id = usertask.id')
	    ->where(array('Users_iduser' => $id_user));
	}
	
	public function getAchievementsWithTaskByCategory($id_category){
// 	    $sql = new Sql($this->dbAdapter);
// 	    $select = $sql->select();
// 	    $select->from('categories')
// 	    ->join('achievements', 'achievements.id = achivetask.id_achive')
// 	    //->join('achivetask', 'achivetask.id_achive = achievements.id')
// 	    //->join('tasks', 'achivetask.id_task = tasks.id')
// 	    ->where(array('categories.id' => $id_category));
// 	    $selectString = $sql->getSqlStringForSqlObject($select);
// 	    $execute      = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
// 	    $result       = $execute->toArray();
// 	    print_r($result);exit;
// 	    return $result;
	}
	
	//Guardar Tarea por Usuario
	public function addUserFinishedTask($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}
	
	//Actualizar Tarea por Usuario 
	//ID_USER,ID_TASK
	public function updateUserTask($id_user,$id_task){
		$connection = $this->dbAdapter->getDriver()->getConnection();
		$connection->beginTransaction();
		$updatedTask = $this->update($data, array("id" => $data['id_task'], "Users_iduser" => $data['id_user']));
		$connection->commit();
		return $updatedTask;
	}
	
	//Agregar Puntos Usuario
	public function updateUserPoints($id_user){
		$sql    = new Sql( $this->adapter );
		$update = $sql->update();
		$update->table( 'users' );
		$update($data, array("id"=>$id_user));		
		$statement  = $sql->prepareStatementForSqlObject( $update );
		$results    = $statement->execute();
						
	}

}