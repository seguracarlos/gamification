<?php
namespace Category\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class CategoryModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'categories';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	public function   getAllCategory(){
		//select from
		$select = $this->select();
		$category= $select->toArray();
		//imprime un array
		//print_r($category);
		return $category;
	}
	//Se crea funcion 	que recibira arreglo
	public function  addCategory($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}
	//
	public function getCategoryById($id_category){		
		//echo "<pre>"; print_r($result); exit;
		//return $result[0];
		$sql = new Sql($this->dbAdapter);
		$select = $this->dbAdapter->query("select * from categories where id=$id_category",Adapter::QUERY_MODE_EXECUTE);
		$result = $select->toArray();
		//imprime echo "<pre>"; print_r($result); exit;
		return $result[0];
	}
	public function updateCategory($data){
		// con esta linea mandamos el update

		$category = $this->update($data, array("id"=>$data['id']));
		//echo "<pre>"; print_r($category); exit;
		return $category;

	}
	public function deleteCategory($id_category){
		//"" se pone el nombre de la base de datos.
		$delete=$this->delete(array("id"=>$id_category));
		return $delete;
	}
}