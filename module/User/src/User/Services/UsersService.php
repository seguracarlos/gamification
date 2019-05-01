<?php

namespace User\Services;
//incluir model
use User\Model\UsersModel;

class UsersService
{
	private $usersModel;

	public function   __construct(){
		$this->usersModel = new UsersModel();
	}

	public function getAllUsers(){
		$users=$this->usersModel->getAllUsers();
		return $users;
	}
	//funcion que va a agregar los datos en el parametro se indica lo que se va a recibir
	public function addUser($formData){
		//se genera un array asosiativo
		$data = array(
			//campos de la base
			"name" => $formData['name'],
			"lastname" => $formData['lastname'],
			"email" => $formData['email']
			);

		$user = $this->usersModel->addUser($data);
		return $user;
	}
	public function getUserById($id_user){
		
		$user = $this->usersModel->getUserById($id_user);
		return $user;
	}

	public function updateUser($formData){
		// enviar solo los parametros que queremos modificar
		$data = array(
			"id_users" => $formData['id_users'],
			"name" => $formData['name'],
			"lastname" => $formData['lastname'],
			"email" => $formData['email']
			);
		//llamada al modelo
		$user = $this->usersModel->updateUser($data);
		return $user;

	}
	public function deleteUser($id_user){
		$user = $this->usersModel->deleteUser($id_user);
		return $user;

	}

}