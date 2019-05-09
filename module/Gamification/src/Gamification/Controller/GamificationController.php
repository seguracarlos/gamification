<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Gamification\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Gamification\Services\LevelsService;
use Gamification\Services\UsersService;
use Gamification\Services\CategoryService;
use Gamification\Services\TasksService;
use Gamification\Services\PlayService;
use Gamification\Model\UserAchievmentModel;

class GamificationController extends AbstractActionController
{
    public function indexAction()
    {
    	$user = new UsersService();
    	$userAchievmentsModel = new UserAchievmentModel();
    	$playService = new PlayService();
    	$achievementsByCategory = "";
    	$id_user = 1;
    	$id_category = 1;
    	$userInfo = $user->getUserById($id_user);
    	$achievementsByCategory = $playService->getAllAchievmentsWithTaskByCategory($id_category);
        $taskMadeByUser = $playService->getTasksMadeByUser($id_user);
        $achievementsByUser = $userAchievmentsModel->getAchievmentMadeByUser($id_user);
        $view = array('user' => $userInfo, 'achievments' => $achievementsByCategory,'taskMadeByUser' => $taskMadeByUser,'achievementsByUser' => $achievementsByUser);
        return new ViewModel($view);
    }
    
    public function addpointsAction(){
    	$request = $this->getRequest();
    	$response = $this->getResponse();
    	if($request->isPost()){
    		//$id_user = $request->getPost()->toArray();
    		$id_user = 1;
    		$points = 10;
    		$play	= new PlayService();
    		$user = $play->addPoints($id_user, $points);
    		if($points){
    			$response->setContent(\Zend\Json\Json::encode(array('response' => true, 'data' => $user)));
    		}else{
    			$response->setContent(\Zend\Json\Json::encode(array('response' => false, "data" => "Error desconocido, consulta al administrador *.*")));
    		}
    	}
    	return $response;
    	exit;
    }
    
    public function savehistorytaskAction(){
    	$request = $this->getRequest();
    	$response = $this->getResponse();
    	if($request->isPost()){
    	    $data = $request->getPost()->toArray();
    		$play	= new PlayService();
    		$task = $play->addUserTasktoHistory($data['id_user'], $data['id_task']);
    		if($task){
    			$response->setContent(\Zend\Json\Json::encode(array('response' => true, 'data' => $task)));
    		}else{
    			$response->setContent(\Zend\Json\Json::encode(array('response' => false, "data" => "Error desconocido, consulta al administrador *.*")));
    		}
    	}
    	return $response;
    	exit;
    }
}
