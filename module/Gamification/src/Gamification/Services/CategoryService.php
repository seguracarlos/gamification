<?php

namespace Gamification\Services;
//incluir model
use Gamification\Model\CategoryModel;

class CategoryService
{
	private $categoryModel;

	public function   __construct(){
		$this->categoryModel = new CategoryModel();
	}

	public function getAllCategory(){
		$category=$this->categoryModel->getAllCategory();
		return $category;
	}
	//funcion que va a agregar los datos en el parametro se indica lo que se va a recibir
	public function addCategory($formData){
		//se genera un array asosiativo
		$data = array(
			//campos de la base
			"name" => $formData['name'],
			"badge" => $formData['badge'],
			"imgpath" => $formData['imgpath'],
			"points" => $formData['points']
		);

		$category = $this->categoryModel->addCategory($data);
		return $category;
	}
	public function getCategoryById($id_category){
		
		$category = $this->categoryModel->getCategoryById($id_category);
		return $category;
	}

	public function updateCategory($formData){
		//echo "<pre>"; print_r($formData);exit;
		// enviar solo los parametros que queremos modificar
		$data = array(
			"id" => $formData['id'],
			"name" => $formData['name'],
			"badge" => $formData['badge'],
			"imgpath" => $formData['imgpath'],
			"points" => $formData['points']
		);
		//llamada al modelo
		$category = $this->categoryModel->updateCategory($data);
		return $category;

	}
	public function deleteCategory($id_category){
		$category = $this->categoryModel->deleteCategory($id_category);
		return $category;

	}

}