<?php
namespace Gamification\Controller;

//librerias para que el controller use las vistas
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Gamification\Services\LevelsService;
//inclucion de formulario
use Gamification\Form\LevelsForm;

class LevelsController extends AbstractActionController
{
	private $levelsService;
	//creacion de un contrucctor
	public function __construct()
	{
		$this->levelsService = new LevelsService();
	}
//creacion de un metodo para visualizar la vista "index"
	public function indexAction(){
		$levels = $this->levelsService->getAllLevels();			
		return new ViewModel(array("levels"=>$levels));
	}
	public function addAction(){
		$form = new LevelsForm();
		//agregacion de validacion
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			//echo "<pre>"; print_r($formData);exit;
			$levels = $this->levelsService->addLevels($formData);
			if ($levels) {
					# valida que la variable tenga algo para regresarlo.
				$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/gamification/levels');
			}
		}
		return array('form'=>$form);
		
	}
	public function updateAction(){
		$form = new LevelsForm();
		#recupera id
		$id_levels = $this->params()->fromRoute("id");		
		$levels = $this->levelsService->getLevelsById($id_levels);
		//carga los valores al formulario
		$form-> setData($levels);
		//para que nos muestre el formulario
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			$levels = $this->levelsService->updateLevels($formData);
			if ($levels) {
					# valida que la variable tenga algo para regresarlo.
				$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/gamification/levels/');
			}
		}
		return array('form'=>$form);
	}
	public function deleteAction(){
		$id_levels = $this->params()->fromRoute("id");
		$levels = $this->levelsService->deleteLevels($id_levels);
		//redirecciona al index del listado.
		return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/gamification/levels');
	}
}