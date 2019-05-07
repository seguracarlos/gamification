<?php
namespace Gamification\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\Feature;

class UserCategoryModel extends TableGateway
{
	private $dbAdapter;

	public function   __construct(){
		$this->dbAdapter = \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
		$this->table = 'usercategory';
		$this->featureSet = new Feature\FeatureSet();
		$this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
		$this->initialize();
	}
	
	//
	public function getCategoryByUser($id_user){
		$sql = new Sql($this->dbAdapter);
		$select = $sql->select();
		$select->from($this->table)
		->join('categories', 'categories.id = usercategory.id_category')
		->join('users', 'users.id = usercategory.id_user')

		->where(array('id_category' => $id_user));
	}
     

	//Actualizar Categoria por Usuario 
	//id_users,id_Category
	public function updateUserCategory($data){
		$connection = $this->dbAdapter->getDriver()->getConnection();
		$connection->beginTransaction();
		$updatedCategory = $this->update($data, array("id" => $data['id_category'], "id_category" => $data['id_category']));
		$connection->commit();
		return $updatedCategory;
	}

}