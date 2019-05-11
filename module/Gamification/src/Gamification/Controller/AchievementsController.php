<?php
namespace Gamification\Controller;

//librerias para que el controller use las vistas
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Gamification\Services\AchievementsService;
//inclucion de formulario
use Gamification\Form\AchievementsForm;

class AchievementsController extends AbstractActionController
{
	private $achievementsService;
	//creacion de un contrucctor
	public function __construct()
	{
		$this->achievementsService = new AchievementsService();
	}
//creacion de un metodo para visualizar la vista "index"
	public function indexAction(){
		$achievements = $this->achievementsService->getAllAchievements();			
		return new ViewModel(array("achievements"=>$achievements));
	}
	public function addAction(){
		$form = new AchievementsForm();
		//agregacion de validacion
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			//echo "<pre>"; print_r($formData);exit;
			$achievements = $this->achievementsService->addAchievements($formData);
			if ($achievements) {
					# valida que la variable tenga algo para regresarlo.
				$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/gamification/achievements');
			}
		}
		return array('form'=>$form);
		
	}
	public function updateAction(){
		$form = new AchievementsForm();
		#recupera id
		$id_achievements = $this->params()->fromRoute("id");		
		$achievements = $this->achievementsService->getAchievementsById($id_achievements);
		//carga los valores al formulario
		$form-> setData($achievements);
		//para que nos muestre el formulario
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			$achievements = $this->achievementsService->updateAchievements($formData);
			//echo "<pre>"; print_r($formData);exit;
			if ($achievements) {
					# valida que la variable tenga algo para regresarlo.
				$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/gamification/achievements');
			}
		}
		return array('form'=>$form);
	}
	public function deleteAction(){
		$id_achievements = $this->params()->fromRoute("id");
		$achievements = $this->achievementsService->deleteAchievements($id_achievements);
		//redirecciona al index del listado.
		return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/gamification/achievements');
	}
}