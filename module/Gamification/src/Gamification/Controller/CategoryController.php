<?php
namespace Gamification\Controller;

//librerias para que el controller use las vistas
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Gamification\Services\CategoryService;
//inclucion de formulario
use Gamification\Form\CategoryForm;

class CategoryController extends AbstractActionController
{
	private $categoryService;
	//creacion de un contrucctor
	public function __construct()
	{
		$this->categoryService = new CategoryService();
	}
//creacion de un metodo para visualizar la vista "index"
	public function indexAction(){
		$category = $this->categoryService->getAllCategory();
		//$saludo = "hola mundo";
		//exit para no mostrar otra vista
		return new ViewModel(array("category"=>$category));
	}
	public function addAction(){
		$form = new CategoryForm();
		//agregacion de validacion
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			//echo "<pre>"; print_r($formData);exit;
			$category = $this->categoryService->addCategory($formData);
			if ($category) {
					# valida que la variable tenga algo para regresarlo.
				$this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/gamification/category');
			}
		}
		return array('form'=>$form);
		
	}
	public function updateAction(){
		$form = new CategoryForm();
		#recupera id
		$id_category = $this->params()->fromRoute("id");
		//echo $id_category; exit;
		$category = $this->categoryService->getCategoryById($id_category);
		//carga los valores al formulario
		$form-> setData($category);

		//para que nos muestre el formulario
		if ($this->getRequest()->isPost()) {
			# recuperar datos
			$formData = $this->getRequest()->getPost();
			//imprime
			//echo "<pre>"; print_r($formData);exit;
			$category = $this->categoryService->updateCategory($formData);
			if ($category) {
					# valida que la variable tenga algo para regresarlo.
				$this->redirect()->toUrl($this->getRequest()->getBAseUrl().'/gamification/category');
			}
		}
		return array('form'=>$form);
	}
	public function deleteAction(){
		$id_category = $this->params()->fromRoute("id");
		$category = $this->categoryService->deleteCategory($id_category);
		//redirecciona al index del listado.
		return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/gamification/category');
	}
}