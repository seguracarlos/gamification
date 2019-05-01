<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'db' => array(
    	'driver' => 'Pdo',
    	//nombre de la base
    	'dsn' => 'mysql:dbname=crud;host=localhost',
    	),
    	'service_manager' => array(
    		'factories' => array(
				'Zend\Db\Adapter\Adapter' => function($serviceManager){
					$adapterFactory = new Zend\Db\Adapter\AdapterServiceFactory();
					$adapter = $adapterFactory->createService($serviceManager);

					\Zend\Db\TableGateway\Feature\GlobalAdapterFeature::setStaticAdapter($adapter);

					return $adapter;
				}
    		)
    	)
);

