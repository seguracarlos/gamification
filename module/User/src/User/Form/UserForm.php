<?php
namespace User\Form;
//Elementos de formularios de zend
use Zend\Form\Element;
use Zend\Form\Form;

class UserForm extends Form
{
	public function __construct($name = null){
		parent::__construct($name);

		//mandamos a traer el metodo post

		$this->setAttributes(array(
			'method' => 'post',
			//identificacion del formulario
			'id'     => 'form'
			 ));
		// para 
		$this->add(array(
			'name' =>'id',
			'attributes' => array(
				// type hidden por que es un campo oculto
				'type' => 'hidden'
				)
			));
		$this->add(array(
			// el  nombre del campo
			'name' =>'name',
			'options' => array(
				//nombre de la etiqueta en el formulario
				'label' => 'Nombre :'
				),
			'attributes' => array(
				// seleccionar el tipo de dato del campo
				'type' =>  'text',
				//asigna un id al campo
				'id' => 'name',
				// para los estilos
				'class' => 'form-control',
				'required' => 'required',
				)
			));
		$this->add(array(
			'name' =>'Levels_idLvl',
			'options' => array(
				'label' => 'Nivel :'
				),
			'attributes' => array(
				'type' =>  'text',
				'id' => 'Levels_idLvl',
				'class' => 'form-control',
				'required' => 'required',
				)
			));
		$this->add(array(
			'name' =>'points',
			'options' => array(
				'label' => 'Puntos :'
				),
			'attributes' => array(
				'type' =>  'text',
				//le pone estilo a los campos
				'class' => 'form-control',
				'required' => 'required',
				)
			));
		//agregar un boton
		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'id' => 'submit',
				'type' => 'submit',
				'value' => 'guardar',
				'title' => 'guardar',
				//le pone estilo a los botones
				'class' => 'btn btn-success'
				),
			));

	}
}