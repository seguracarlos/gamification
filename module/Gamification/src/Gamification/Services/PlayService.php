<?php

namespace Gamification\Services;
//incluir model
use Gamification\Model\PlayModel;
use Gamification\Model\UsersModel;
use Gamification\Model\UserTaskModel;
use Gamification\Model\AchieveTaskModel;
use Gamification\Model\TasksModel;
use Gamification\Model\AchivevemntModel;
use Gamification\Model\UserTaskHistoryModel;
use Gamification\Model\UserAchievmentModel;

class PlayService
{
	private $playModel;
	private $userModel;
	private $userTaskModel;
	private $achieveTaskModel;
	private $taskModel;
    private $usertaskhistoryModel;
    private $userAchievement;
    
	public function   __construct(){
		$this->playModel = new PlayModel();
		$this->userModel = new UsersModel();
		$this->userTaskModel = new UserTaskModel();
		$this->achieveTaskModel = new AchieveTaskModel();
		$this->taskModel = new TasksModel();
		$this->achievementModel = new AchivevemntModel();
		$this->usertaskhistoryModel = new UserTaskHistoryModel();
		$this->userAchievement = new UserAchievmentModel();
	}

	public function getPointByUser($id_user){
		$pointsByUser = $this->userModel->getUserById($id_user);
		return $pointsByUser;
	}

	
	public function getTasksByAchiemvent($id_achievment){
		$taskByAchievment = $this->achieveTaskModel->getTaskByAchievment($id_achievment);
		return $taskByAchievment;		
	}
	
	public function getAchievmentsbyUser($id_user){
	    $achievmentsByUser = $this->achievementModel->getA($id_user);
		return $achievmentsByUser;
	}
	
	public function getAllAchievmentsWithTaskByCategory($id_category){
	    $achievementsByCategory = $this->achievementModel->getAchievementsByCategory($id_category);
	    $achievementsWithTasks = array();
   
   	    if($achievementsByCategory){
   	        foreach($achievementsByCategory as $achievment){
   	            $tasks = $this->taskModel->getTasksByAchievement($achievment['id']);
   	            $agroup = array(
   	                'id_category' => $achievment['id_category'],
   	                'id_achive' => $achievment['id_achive'],
   	                'name' => $achievment['name'],
   	                'badge' => $achievment['badge'],
   	                'imgpath' => $achievment['imgpath'],
   	                'points' => $achievment['points'],
   	                'tasks' => $tasks
   	            );
   	            
   	            array_push($achievementsWithTasks, $agroup);
   	        }
	    }
	    
	    return $achievementsWithTasks;

	}
	
	public function getTasksMadeByUser($id_user){
	    $taskMadeByUser = $this->userTaskModel->getTaskMadeByUser($id_user);
	    return $taskMadeByUser;
	}
	
	public function checkTask($id_task,$iduser,$count){
		
	}
	
	public function addPoints($id_user,$points){
		$actualPoints = $this->userModel->getUserById($id_user);
		$newPoints = $actualPoints['points'] + $points;
		$data = array(
				'id' => $id_user,
				'points' => $newPoints
		);
		
		$updatePoints = $this->userModel->updateUser($data);

// 		NOTA:
// 		Una vez que se agregan los puntos hay que compararlos con los puntos de la siguiente categoria
// 		y del nivel siguiente al que se encuentra el usuario actualmente, si el numero de puntos actualizadose
//         es mayor o igual a los de la categoria y/o nivel tenemos que hacer un update al usuario
        
//         $pointsNextCategory = categoryService ->getNextCategoryPoints($id_user)
//         $pointsNextLevel = levelService -> getNextLevelPoints($id_user)
        
//         if($updatePoints['points'] >= $pointsNextCategory){
// 		    actualizarCategoriaUsuario($id_user)
// 		}
		    
// 		if($updatePoints['points'] >= $pointsNextLevel){
// 		    actualizarNivelUsuario($id_user)
// 		}
		    
		return $updatePoints;
	}
	
	public function addUserTasktoHistory($id_user,$id_task){
	    $info = array(
	        'updatedPoints' => 0,
	        'taskComplete' => 0,
	        'achievementComplete' => 0
	    );
	 		$data = array(
    		    'id_user' => $id_user,
				'id_task' => $id_task,
		        'date' => '',
				'value' => 1
		);
		//Se agrega un historial por cada count de tarea
		$addTaskHistory = $this->usertaskhistoryModel->addUserTasktoHistory($data);	
		
		//Traemos el historial por tarea
        $historyTaskByUser = $this->usertaskhistoryModel->getUserTaskHistoryById($id_user, $id_task);
        
        //Consultamos el count que pide la tarea
        $taskInfo = $this->taskModel->getTasksById($id_task);
        
//         Si el count del historial de la tarea es igual al requisito que pide la tarea, agregamos puntos y 
//         guardamos la tarea como realizada
        if(count($historyTaskByUser) == $taskInfo['calculateValue1']){
            $this->addPoints($id_user, $taskInfo['points']);
            $info['taskDoNE'] = 1;
            $pointsByTask = $this->taskModel->getTasksById($id_task);
            $updatedPoints =  $this->addPoints($id_user, $pointsByTask['points']);
            $info['taskComplete'] = 1;
            $info['updatedPoints'] = $updatedPoints['points'];
            $this->saveFinishedTask($id_user, $id_task);
            
        }
        
		return $info;
	}
	
	public function saveFinishedTask($id_user,$id_task){
	    $data = array(
	        'id' => $id_task,
	        'Users_iduser' => $id_user,
	        'isDone' => 1
	    );
	    $finishedTask = $this->playModel->addUserFinishedTask($data);
	    return $finishedTask;
	}
	
	
	public function updateTaskStatus($id_user,$id_task){		
		$data = array(
				'id' => $id_task,
				'Users_iduser' => $id_user,
				'isDone' => $taskStatus
		);
		$updateTask = $this->playModel->updateUserTask($data);
	}

}