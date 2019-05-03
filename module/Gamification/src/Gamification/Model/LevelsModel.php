<?php
namespace Levels\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class LevelsModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'levels';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	public function   getAllLevels(){
		//select from
		$select = $this->select();
		$levels = $select->toArray();
		//imprime un array
		//print_r($levels);
		return $levels;
	}
	//Se crea funcion 	que recibira arreglo
	public function  addLevels($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}
	//
	public function getLevelsById($id_levels){		
		//echo "<pre>"; print_r($result); exit;
		//return $result[0];
		$sql = new Sql($this->dbAdapter);
		$select = $this->dbAdapter->query("select * from levels where id=$id_levels",Adapter::QUERY_MODE_EXECUTE);
		$result = $select->toArray();
		//imprime echo "<pre>"; print_r($result); exit;
		return $result[0];
	}
	public function updateLevels($data){
		// con esta linea mandamos el update
		$levels = $this->update($data, array("id"=>$data['id']));
		return $levels;
	}
	public function deleteLevels($id_levels){
		//"" se pone el nombre de la base de datos.
		$delete=$this->delete(array("id"=>$id_levels));
		return $delete;
	}
}