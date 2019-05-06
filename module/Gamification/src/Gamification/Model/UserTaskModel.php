<?php
namespace Gamification\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class UserTaskModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'usertask';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	
	//
	public function getTaskByUser($id_user){
		$sql = new Sql($this->dbAdapter);
		$select = $sql->select();
		$select->from($this->table)
		->join('tasks', 'tasks.id = usertask.id')
		->where(array('Users_iduser' => $id_user));
	}
	
	//Guardar Tarea por Usuario
	public function addUserTask($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}
	
	//Actualizar Tarea por Usuario 
	//ID_USER,ID_TASK
	public function updateUserTask($data){
		$connection = $this->dbAdapter->getDriver()->getConnection();
		$connection->beginTransaction();
		$updatedTask = $this->update($data, array("id" => $data['id_task'], "Users_iduser" => $data['id_user']));
		$connection->commit();
		return $updatedTask;
	}
	
	//Agregar Puntos Usuario
	public function updateUserPointsByTask($id_user,$points){
		$sql    = new Sql( $this->adapter );
		$update = $sql->update();
		$update->table( 'users' );
		$update($data, array("id"=>$id_user));		
		$statement  = $sql->prepareStatementForSqlObject( $update );
		$results    = $statement->execute();
						
	}

}