<?php

return array(
		'controllers' => array(
			'invokables' => array(
				// llamado del controlador
					'User\Controller\Users' => 'User\Controller\UsersController'
			),		
		),
        // configuracion de la ruta
		'router'=>array(
				'routes' => array(
						'user' => array(
						'type' => 'Segment',
						'options' => array(
							// ruta con los parametros
								'route' => '/user[/[:action]][/:id]',
								'constraints' => array(
										'action'=> '[a-zA-z][a-zA-Z0-9_-]*',
								),
								
								'defaults' => array(
										'controller' => 'User\Controller\Users',
										'action'     => 'index'
								
								),
						),
				),
		),
	),


		'view_manager' => array(
// 				'display_not_found_reason' => true,
// 				'display_exceptions'       => true,
// 				'doctype'                  => 'HTML5',
// 				'not_found_template'       => 'error/404',
// 				'exception_template'       => 'error/index',
// 				'template_map' => array(
// 					// indicamos los archivos que contiene el modulo en la vista
// 				'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
// 						'user/users/index' => __DIR__ . '/../view/user/users/index.phtml',
// 						'error/404'               => __DIR__ . '/../view/error/404.phtml',
// 						'error/index'             => __DIR__ . '/../view/error/index.phtml',
// 				),
				// indicamos de donde va a sacar las vistas el controlador
				'template_path_stack' => array(
						'user' =>  __DIR__ . '/../view',
				),
		),
		
);