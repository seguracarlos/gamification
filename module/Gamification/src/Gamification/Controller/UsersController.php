<?php
namespace Gamification\Controller;

//librerias para que el controller use las vistas
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use User\Services\UsersService;
//inclucion de formulario
use User\Form\UserForm;

class UsersController extends AbstractActionController
{
	private $userService;
	//creacion de un contrucctor
	public function __construct()
	{
		$this->userService = new UsersService();
	}
//creacion de un metodo para visualizar la vista "index"
	public function indexAction(){
		$users = $this->userService->getAllUsers();
		//$saludo = "hola mundo";
		//exit para no mostrar otra vista
		return new ViewModel(array("users"=>$users));
	}
	public function addAction(){
		$form = new UserForm();
		//agregacion de validacion
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			//echo "<pre>"; print_r($formData);exit;
			$user = $this->userService->addUser($formData);
				if ($user) {
					# valida que la variable tenga algo para regresarlo.
					$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/user');
				}
		}
		return array('form'=>$form);
		
	}
	public function updateAction(){
		$form = new UserForm();
		#recupera id
		$id_user = $this->params()->fromRoute("id");
		//echo $id_user; exit;
		$user = $this->userService->getUserById($id_user);
		//carga los valores al formulario
		$form-> setData($user);
		//para que nos muestre el formulario
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			//echo "<pre>"; print_r($formData);exit;
			$user = $this->userService->updateUser($formData);
				if ($user) {
					# valida que la variable tenga algo para regresarlo.
					$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/user');
				}
		}
		return array('form'=>$form);
		}
	public function deleteAction(){
		$id_user = $this->params()->fromRoute("id");
		$user = $this->userService->deleteUser($id_user);
		//redirecciona al index del listado.
		return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/user/');
	}
}