<?php

return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => '5-Channel-test',
	'preload' => array('log'),
	'import' => array(
		'application.models.*',
		'application.models.ar.*',
		'application.models.forms.*',
		'application.models.custom.*',
		'application.components.*',
		'application.helpers.*',
		'application.widgets.*',
		'application.behaviors.*',
	),
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => '123',
			'ipFilters' => array('127.0.0.1'),
		),
		'admin',
	),
	'components' => array(
                'cache'=>array(
                    'class'=>'CApcCache',
//                    'class'=>'CMemCache',
//                    'servers'=>array(
//                        array('host'=>'localhost', 'port'=>11211, 'weight'=>60),
//                    ),
                ),
                
		'user' => array(
			'allowAutoLogin' => true,
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'<TYPE:(news|blog)>' => 'article/list',
				'<TYPE:(news|blog)>/page/<PAGE:\d+>' => 'article/list',
				'<TYPE:(news|blog)>/sort/<SORT:(popular|best)>' => 'article/list',
				'<TYPE:(news|blog)>/sort/<SORT:(popular|best)>/page/<PAGE:\d+>' => 'article/list',
				'<TYPE:(news|blog)>/sort/<SORT:(popular|best)>/interval/<INTERVAL:(day|week|month|year)>' => 'article/list',
				'<TYPE:(news|blog)>/sort/<SORT:(popular|best)>/interval/<INTERVAL:(day|week|month|year)>/page/<PAGE:\d+>' => 'article/list',
				
				'<TYPE:(news|blog)>/<CATEGORY:\w+>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/page/<PAGE:\d+>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/sort/<SORT:(popular|best)>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/sort/<SORT:(popular|best)>/page/<PAGE:\d+>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/sort/<SORT:(popular|best)>/interval/<INTERVAL:(day|week|month|year)>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/sort/<SORT:(popular|best)>/interval/<INTERVAL:(day|week|month|year)>/page/<PAGE:\d+>' => 'article/list',
				
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/<SUB_CATEGORY:\w+>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/<SUB_CATEGORY:\w+>/page/<PAGE:\d+>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/<SUB_CATEGORY:\w+>/sort/<SORT:(popular|best)>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/<SUB_CATEGORY:\w+>/sort/<SORT:(popular|best)>/page/<PAGE:\d+>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/<SUB_CATEGORY:\w+>/sort/<SORT:(popular|best)>/interval/<INTERVAL:(day|week|month|year)>' => 'article/list',
				'<TYPE:(news|blog)>/<CATEGORY:\w+>/<SUB_CATEGORY:\w+>/sort/<SORT:(popular|best)>/interval/<INTERVAL:(day|week|month|year)>/page/<PAGE:\d+>' => 'article/list',
				
				'article/<ALIAS:\w+>' => 'article/show/alias/<ALIAS>',
			),
		),
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=5-channel;',
			'username' => 'root',
			'password' => '12345',
			'charset' => 'utf8',
			'enableProfiling' => true,
			'enableParamLogging' => true,
                        'schemaCachingDuration'=>10
		),
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					'ipFilters' => array('127.0.0.1'),
				),
			),
		),
	),
);