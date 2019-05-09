<?php
namespace Gamification\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class AchivevemntModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'achievements';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	public function getAllAchievements(){
		//select from
		$select = $this->select();
		$category= $select->toArray();
		//imprime un array
		//print_r($category);
		return $category;
	}
	//Se crea funcion 	que recibira arreglo
	public function  addAchievement($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}
	//
	
	public function getAchievementsByCategory($id_category){
	    $sql = new Sql($this->dbAdapter);
	    $select = $sql->select();
	    $select->from('achivecategory')
	    ->join('achievements', 'achivecategory.id_achive = achievements.id')
	    ->where(array('id_category' => $id_category));
	    $selectString = $sql->getSqlStringForSqlObject($select);
	    $execute      = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
	    $result       = $execute->toArray();
	    return $result;
	    	    
	}
	
		
	public function updateAchievement($data){
		// con esta linea mandamos el update

		$achievement = $this->update($data, array("id"=>$data['id']));
		//echo "<pre>"; print_r($category); exit;
		return $achievement;

	}

}