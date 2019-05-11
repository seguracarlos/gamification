<?php

namespace Gamification\Services;
//incluir model
use Gamification\Model\AchievementsModel;

class AchievementsService
{
	private $achievementsModel;

	public function   __construct(){
		$this->achievementsModel = new AchievementsModel();
	}

	public function getAllAchievements(){
		$achievements=$this->achievementsModel->getAllAchievements();
		return $achievements;
	}
	//funcion que va a agregar los datos en el parametro se indica lo que se va a recibir
	public function addAchievements($formData){
		//se genera un array asosiativo
		$data = array(
			//campos de la base
			"name" => $formData['name'],
			"badge" => $formData['badge'],
			"imgpath" => $formData['imgpath'],
			"points" => $formData['points']
		);

		$achievements = $this->achievementsModel->addAchievements($data);
		return $achievements;
	}
	public function getAchievementsById($id_achievements){
		
		$achievements = $this->achievementsModel->getAchievementsById($id_achievements);
		return $achievements;
	}

	public function updateAchievements($formData){
		// enviar solo los parametros que queremos modificar
		 //echo "<pre>"; print_r($formData); exit;
		$data = array(
			"id" => $formData['id'],
			"name" => $formData['name'],
			"badge" => $formData['badge'],
			"imgpath" => $formData['imgpath'],
			"points" => $formData['points']
		);
		//llamada al modelo
		$achievements = $this->achievementsModel->updateAchievements($data);
		return $achievements;

	}
	public function deleteAchievements($id_achievements){
		$achievements = $this->achievementsModel->deleteAchievements($id_achievements);
		return $achievements;

	}

}