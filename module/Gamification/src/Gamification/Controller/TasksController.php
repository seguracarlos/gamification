<?php
namespace Gamification\Controller;

//librerias para que el controller use las vistas
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Gamification\Services\TasksService;
//inclucion de formulario
use Gamification\Form\TasksForm;

class TasksController extends AbstractActionController
{
	private $tasksService;
	//creacion de un contrucctor
	public function __construct()
	{
		$this->tasksService = new TasksService();
	}
//creacion de un metodo para visualizar la vista "index"
	public function indexAction(){
		$tasks = $this->tasksService->getAllTasks();
		//$saludo = "hola mundo";
		//exit para no mostrar otra vista
		return new ViewModel(array("tasks"=>$tasks));
	}
	public function addAction(){
		$form = new TasksForm();
		//agregacion de validacion
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			//echo "<pre>"; print_r($formData);exit;
			$tasks = $this->tasksService->addTasks($formData);
			if ($tasks) {
					# valida que la variable tenga algo para regresarlo.
				$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/gamification/tasks');
			}
		}
		return array('form'=>$form);
		
	}
	public function updateAction(){
		$form = new TasksForm();
		#recupera id
		$id_tasks = $this->params()->fromRoute("id");
		$tasks = $this->tasksService->getTasksById($id_tasks);
		//carga los valores al formulario
		$form-> setData($tasks);
		//para que nos muestre el formulario
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			//echo "<pre>"; print_r($formData);exit;
			$tasks = $this->tasksService->updateTasks($formData);
			if ($tasks) {
					# valida que la variable tenga algo para regresarlo.
				$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/gamification/tasks');
			}
		}
		return array('form'=>$form);
	}
	public function deleteAction(){
		$id_tasks = $this->params()->fromRoute("id");
		$tasks = $this->tasksService->deleteTasks($id_tasks);
		//redirecciona al index del listado.
		return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/gamification/tasks/');
	}
}