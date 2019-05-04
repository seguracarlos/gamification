<?php
namespace Gamification\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class TasksModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'tasks';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	public function   getAllTasks(){
		//select from
		$select = $this->select();
		$tasks = $select->toArray();
		return $tasks;
	}
	//Se crea funcion 	que recibira arreglo
	public function  addTasks($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}
	//
	public function getTasksById($id_tasks){

		$sql = new Sql($this->dbAdapter);
		$select = $this->dbAdapter->query("select * from tasks where id=$id_tasks",Adapter::QUERY_MODE_EXECUTE);
		$result = $select->toArray();
		//imprime echo "<pre>"; print_r($result); exit;
		return $result[0];
	}
	public function updateTasks($data){
		// con esta linea mandamos el update
		$tasks = $this->update($data, array("id"=>$data['id']));
		return $tasks;
	}
	public function deleteTasks($id_tasks){
		//"" se pone el nombre de la base de datos.
		$delete=$this->delete(array("id"=>$id_tasks));
		return $delete;
	}
}