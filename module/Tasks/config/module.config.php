<?php

return array(
	'controllers' => array(
		'invokables' => array(
				// llamado del controlador
			'Tasks\Controller\Tasks' => 'Tasks\Controller\TasksController'
		),		
	),
        // configuracion de la ruta
	'router'=>array(
		'routes' => array(
			'tasks' => array(
				'type' => 'Segment',
				'options' => array(
							// ruta con los parametros
					'route' => '/tasks[/[:action]][/:id]',
					'constraints' => array(
						'action'=> '[a-zA-z][a-zA-Z0-9_-]*',
					),
					
					'defaults' => array(
						'controller' => 'Tasks\Controller\Tasks',
						'action'     => 'index'
						
					),
				),
			),
		),
	),


 	'view_manager' => array(
// 		'display_not_found_reason' => true,
// 		'display_exceptions'       => true,
// 		'doctype'                  => 'HTML5',
// 		'not_found_template'       => 'error/404',
// 		'exception_template'       => 'error/index',
// 		'template_map' => array(
// 					// indicamos los archivos que contiene el modulo en la vista
// 			'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
// 			'tasks/tasks/index' => __DIR__ . '/../view/tasks/tasks/index.phtml',
// 			'error/404'               => __DIR__ . '/../view/error/404.phtml',
// 			'error/index'             => __DIR__ . '/../view/error/index.phtml',
// 		),
// 				// indicamos de donde va a sacar las vistas el controlador
		'template_path_stack' => array(
			'tasks' =>  __DIR__ . '/../view',
		),
	),
	
);