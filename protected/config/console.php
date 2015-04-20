<?php

return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'My Console Application',
	'preload' => array('log'),
	'import' => array(
		'application.components.migrations.*',
		'application.components.*',
		'application.models.*',
		'application.models.ar.*',
		'application.helpers.*',
	),
	'commandMap' => array(
		'migrate' => array(
			'class' => 'system.cli.commands.MigrateCommand',
			'migrationPath' => 'application.migrations.db',
			'migrationTable' => 'tbl_migration',
			'connectionID' => 'db',
			'templateFile' => 'application.migrations.templates.default',
		),
	),
	'components' => array(
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=5-channel;',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '12345',
			'charset' => 'utf8',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
			),
		),
	),
);