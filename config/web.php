<?php
	
	$params = require __DIR__ . '/params.php';
	$db = require __DIR__ . '/db.php';
	$dbusers = require __DIR__ . '/dbusers.php';
	
	$config = [
		'language' => 'ru',
		'id' => 'basic',
		'basePath' => dirname(__DIR__),
		'bootstrap' => ['log', 'bootstrap'],
		'aliases' => [
			'@bower' => '@vendor/bower-asset',
			'@npm' => '@vendor/npm-asset',
			'@img' => '@app/web/img',
		],
		'modules' => [
			'admin' => [
				'class' => 'app\modules\admin\Module',
			],
			'rbac' => [
				'class' => 'yii2mod\rbac\Module',
				'controllerMap' => [
					'assignment' => [
						'class' => 'yii2mod\rbac\controllers\AssignmentController',
						'userIdentityClass' => \app\models\tables\Users::class, // тут указал класс таблицы пользователей
						'searchClass' => [
							'class' => 'yii2mod\rbac\models\search\AssignmentSearch',
							'pageSize' => 10,
						],
						'idField' => 'id',
						'usernameField' => 'name', // тут указал как у меня в БД называется поле с именем юзера
						'gridViewColumns' => [
							'id',
							'name', // аналогично
							'email'
						],
					],
				],
			],
		],
		'components' => [
			'authManager' => [
				'class' => 'yii\rbac\DbManager',
				'defaultRoles' => ['guest', 'user'],
			],
			'i18n' => [
				'translations' => [
					'main*' => [
						'class' => \yii\i18n\PhpMessageSource::class,
						'basePath' => '@app/messages',
					],
					'yii2mod.rbac' => [
						'class' => 'yii\i18n\PhpMessageSource',
						'basePath' => '@yii2mod/rbac/messages',
					],
				]
			],
			'bootstrap' => [
				'class' => \app\components\Bootstrap::class,
			],
			'request' => [
				// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
				'cookieValidationKey' => 'ba7GKNe0am1u3v9Fh9AyYw27hGU1SZUG',
			],
			'cache' => [
				'class' => 'yii\caching\FileCache',
			],
			'user' => [
				'identityClass' => 'app\models\User',
				'enableAutoLogin' => true,
			],
			'errorHandler' => [
				'errorAction' => 'site/error',
			],
			'mailer' => [
				'class' => 'yii\swiftmailer\Mailer',
				// send all mails to a file by default. You have to set
				// 'useFileTransport' to false and configure a transport
				// for the mailer to send real emails.
				'useFileTransport' => true,
			],
			'log' => [
				'traceLevel' => YII_DEBUG ? 3 : 0,
				'targets' => [
					[
						'class' => 'yii\log\FileTarget',
						'levels' => ['error', 'warning'],
					],
				],
			],
			'db' => $db,
			'dbUsers' => $dbusers,
			'urlManager' => [
				'enablePrettyUrl' => true,
				'showScriptName' => false,
				'enableStrictParsing' => false,
				'rules' => [
					'task-edit/<id>' => 'task/one',
					'task' => 'task/index',
				],
			],
		],
		'params' => $params,
	];
	
	if (YII_ENV_DEV) {
		// configuration adjustments for 'dev' environment
		$config['bootstrap'][] = 'debug';
		$config['modules']['debug'] = [
			'class' => 'yii\debug\Module',
			// uncomment the following to add your IP if you are not connecting from localhost.
			//'allowedIPs' => ['127.0.0.1', '::1'],
		];
		
		$config['bootstrap'][] = 'gii';
		$config['modules']['gii'] = [
			'class' => 'yii\gii\Module',
			// uncomment the following to add your IP if you are not connecting from localhost.
			//'allowedIPs' => ['127.0.0.1', '::1'],
		];
	}
	
	return $config;
