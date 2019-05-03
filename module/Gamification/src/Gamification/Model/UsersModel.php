<?php
namespace User\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class UsersModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'users';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	public function   getAllUsers(){
		//select from
		$select = $this->select();
		$users = $select->toArray();
		//imprime un array
		//print_r($users);
		return $users;
	}
	//Se crea funcion 	que recibira arreglo
	public function  addUser($data){
		//inserta el array desde el service
		$this->insert($data);
		return $data;
	}
	//
	public function getUserById($id_user){

		//$sql = new Sql($this->dbAdapter);
		//consula
		//$select = $sql->select();
		//columnas
		//$select->columns(array('id_users','name','lastname','email'))
		//->from('users')
		//->where(array('id_users'=>$id_user));

		//$selectString = $sql ->getSqlStringForSqlObject($select);
		//ejecuta la consulta
		//$execute = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);
		//Se pasa a array
		//$result = $execute->toArray();

		//echo "<pre>"; print_r($result); exit;
		//return $result[0];
		$sql = new Sql($this->dbAdapter);
		$select = $this->dbAdapter->query("select * from users where id=$id_user",Adapter::QUERY_MODE_EXECUTE);
		$result = $select->toArray();
		//imprime echo "<pre>"; print_r($result); exit;
		return $result[0];
	}
	public function updateUser($data){
		// con esta linea mandamos el update
		$user = $this->update($data, array("id"=>$data['id']));
		return $user;
	}
	public function deleteUser($id_user){
		//"" se pone el nombre de la base de datos.
		$delete=$this->delete(array("id"=>$id_user));
	         return $delete;
	}
}