<?php

namespace Gamification\Services;
//incluir model
use Gamification\Model\LevelsModel;

class LevelsService
{
	private $levelsModel;

	public function   __construct(){
		$this->levelsModel = new LevelsModel();
	}

	public function getAllLevels(){
		$levels=$this->levelsModel->getAllLevels();
		return $levels;
	}
	//funcion que va a agregar los datos en el parametro se indica lo que se va a recibir
	public function addLevels($formData){
		//se genera un array asosiativo
		$data = array(
			//campos de la base
			"name" => $formData['name'],
			"badge" => $formData['badge'],
			"imgpath" => $formData['imgpath'],
			"minpoints" => $formData['minpoints'],
			"points" => $formData['points']
		);

		$levels = $this->levelsModel->addLevels($data);
		return $levels;
	}
	public function getLevelsById($id_levels){
		
		$levels = $this->levelsModel->getLevelsById($id_levels);
		return $levels;
	}

	public function updateLevels($formData){
		// enviar solo los parametros que queremos modificar
		$data = array(
			"id" => $formData['id'],
			"name" => $formData['name'],
			"badge" => $formData['badge'],
			"imgpath" => $formData['imgpath'],
			"minpoints" => $formData['minpoints'],
			"points" => $formData['points']
		);
		//llamada al modelo
		$levels = $this->levelsModel->updateLevels($data);
		return $levels;

	}
	public function deleteLevels($id_levels){
		$levels = $this->levelsModel->deleteLevels($id_levels);
		return $levels;

	}

}