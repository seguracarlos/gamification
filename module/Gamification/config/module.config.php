<?php

return array(
	'controllers' => array(
		'invokables' => array(
				// llamado del controlador
			'Gamification\Controller\Gamification' => 'Gamification\Controller\GamificationController',
			'Gamification\Controller\Category' => 'Gamification\Controller\CategoryController',
			'Gamification\Controller\Users' => 'Gamification\Controller\UsersController',
			'Gamification\Controller\Tasks' => 'Gamification\Controller\TasksController',
			'Gamification\Controller\Levels' => 'Gamification\Controller\LevelsController',
		),		
	),
        // configuracion de la ruta

	'router'=>array(
		'routes' => array(
			'gamification' => array(
				'type' => 'Literal',
				'options' => array(
							// ruta con los parametros
					'route' => '/gamification',
					
					'defaults' => array(
                        '__NAMESPACE__' => 'Gamification\Controller',
                        'controller'    => 'Gamification',
                        'action'        => 'index',
						
					),
				),

				'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]][/:id]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
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
// 			'category/category/index' => __DIR__ . '/../view/category/category/index.phtml',
// 			'error/404'               => __DIR__ . '/../view/error/404.phtml',
// 			'error/index'             => __DIR__ . '/../view/error/index.phtml',
// 		),
// 				// indicamos de donde va a sacar las vistas el controlador
 		'template_path_stack' => array(
 			'category' =>  __DIR__ . '/../view',
 		),
 	),
	
);