<?php
namespace Gamification\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class AchieveTaskModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'achivetask';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	
	public function getTaskByAchievment($id_achievment){
		//select from
		$sql = new Sql($this->dbAdapter);
		$select = $sql->select();
		$select->from($this->table)
		->join('achievements', 'achivetask.id_achive = achievements.id')		
		->join('tasks', 'achivetask.id_task = tasks.id')		
		->where(array('id_achive' => $id_achievment));
		$selectString = $sql->getSqlStringForSqlObject($select);
		$execute      = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		$result       = $execute->toArray();
		return $result;
		
	}
	
	public function saveTaskByAchievment($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}

}