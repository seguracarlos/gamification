<?php
namespace Gamification\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class AchievementsModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'achievements';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	public function   getAllAchievements(){
		//select from
		$select = $this->select();
		$achievements = $select->toArray();
		//imprime un array
		//print_r($levels);
		return $achievements;
	}
	//Se crea funcion 	que recibira arreglo
	public function  addAchievements($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}
	//
	public function getAchievementsById($id_achievements){		
		//echo "<pre>"; print_r($result); exit;
		//return $result[0];
		$sql = new Sql($this->dbAdapter);
		$select = $this->dbAdapter->query("select * from achievements where id=$id_achievements",Adapter::QUERY_MODE_EXECUTE);
		$result = $select->toArray();
		// echo "<pre>"; print_r($result); exit;
		return $result[0];
	}
	public function updateAchievements($data){
		//echo "<pre>"; print_r($data); exit;
		// con esta linea mandamos el update
		$achievements = $this->update($data, array("id"=>$data['id']));
		return $achievements;
	}
	
	public function deleteAchievements($id_achievements){
		//"" se pone el nombre de la base de datos.
		$delete=$this->delete(array("id"=>$id_achievements));
		return $delete;
	}
}