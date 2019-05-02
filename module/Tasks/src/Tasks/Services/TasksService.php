<?php

namespace Tasks\Services;
//incluir model
use Tasks\Model\TasksModel;

class TasksService
{
	private $tasksModel;

	public function   __construct(){
		$this->tasksModel = new TasksModel();
	}

	public function getAllTasks(){
		$tasks=$this->tasksModel->getAllTasks();
		return $tasks;
	}
	//funcion que va a agregar los datos en el parametro se indica lo que se va a recibir
	public function addTasks($formData){
		/*echo "<pre>"; print_r($formData); exit;
		$fechaformatoingles = ($data['maxDate'] != '') ? date('Y-m-d', strtotime($data['maxDate'])) : "0000-00-00";*/
		//se genera un array asosiativo
		$data = array(
			//campos de la base
			"name" => $formData['name'],
			"badge" => $formData['badge'],
			"imgpath" => $formData['imgpath'],
			"points" => $formData['points'],
			"maxDate" => $formData['maxDate'],
			);

		$tasks = $this->tasksModel->addTasks($data);
		return $tasks;
	}
	public function getTasksById($id_tasks){
		
		$tasks = $this->tasksModel->getTasksById($id_tasks);
		return $tasks;
	}

	public function updateTasks($formData){
		/*$fechaformatoingles = ($data['maxDate'] != '') ? date('Y-m-d', strtotime($data['maxDate'])) : "0000-00-00";*/
		// enviar solo los parametros que queremos modificar
		$data = array(
			"id" => $formData['id'],
			"name" => $formData['name'],
			"badge" => $formData['badge'],
			"imgpath" => $formData['imgpath'],
			"points" => $formData['points'],
			"maxDate" => $formData['maxDate']
			);
		//llamada al modelo
		$tasks = $this->tasksModel->updateTasks($data);
		return $tasks;

	}
	public function deleteTasks($id_tasks){
		$tasks = $this->tasksModel->deleteTasks($id_tasks);
		return $tasks;

	}

}