<?php
use kartik\mpdf\Pdf;
use kartik\datecontrol\Module;
$params = require(__DIR__ . '/params.php');


$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'maintenanceMode'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'uxBSKdQ_mME5d2u7TCzWD4XzIPnCfYPC',
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
        'urlManager' => [
	        'class' => 'yii\web\UrlManager',
	        // Disable index.php
	        'showScriptName' => true,
	        // Disable r= routes
	        'enablePrettyUrl' => true,
	        'rules' => array(
	                '<controller:\w+>/<id:\d+>' => '<controller>/view',
	                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
	                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
	        ),
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
        'db' => require(__DIR__ . '/db.php'),
        'maintenanceMode'=>[
		      'class' => '\brussens\maintenance\MaintenanceMode',		
		    ],
		    'pdf' => [
		        'class' => Pdf::classname(),
		        'format' => Pdf::FORMAT_A4,
		        'orientation' => Pdf::ORIENT_PORTRAIT,
		        'destination' => Pdf::DEST_BROWSER,
                 'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
		        // refer settings section for all configuration options
		    ],
		    'formatter' => [
		        'class' => 'yii\i18n\formatter',
		        'thousandSeparator' => ',',
		        'decimalSeparator' => '.',
		    ]
    ],    
    'params' => $params,
    'language'=>'es',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
		  'class' => 'yii\gii\Module',
		  'allowedIPs' => ['127.0.0.1', '::1', '192.168.1.2', '192.168.1.7'],
		 ];
    
		$config['modules']['gridview'] = [
        'class' => 'kartik\grid\Module',
    ];
		 
		$config['modules']['datecontrol']= [
      'class' => 'kartik\datecontrol\Module',
 
        // format settings for displaying each date attribute
        'displaySettings' => [
            'date' => 'd-m-Y',
            'time' => 'H:i:s A',
            'datetime' => 'd-m-Y H:i:s A',
        ],

        // format settings for saving each date attribute
        'saveSettings' => [
            'date' => 'Y-m-d', 
            'time' => 'H:i:s',
            'datetime' => 'Y-m-d H:i:s',
        ],



        // automatically use kartik\widgets for each of the above formats
        'autoWidget' => true,
		];
}

return $config;
