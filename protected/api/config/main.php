<?php

Yii::setPathOfAlias('api', dirname(__FILE__) . '/../');
Yii::setPathOfAlias('app', dirname(__FILE__) . '/../../');

return array(
	'basePath' => dirname(__FILE__) . '/../',
	'name' => 'API',
	'preload' => array('log'),
	'import' => array(
		'api.components.*',
		'api.components.api.*',
		'api.components.response.*',
		'app.components.*',
		'app.models.*',
		'app.models.ar.*',
	),
	'components' => array(
		'user' => array(
			'allowAutoLogin' => true,
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(),
		),
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=shop',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '12345',
			'charset' => 'utf8',
		),
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
	),
);