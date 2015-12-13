<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
	 'mimin' => [
        'class' => 'hscstudio\mimin\Module',
    ],

    ],
     'as access' => [
     'class' => 'hscstudio\mimin\components\AccessControl',
     'allowActions' => [
        // add wildcard allowed action here!
        'site/*',
        'debug/*',
        //'*',
        //'mimin/*', // only in dev mode
    	],
	],
     'homeUrl' => '/yii2-cms/admin',
    'components' => [

           'request' => [
            'baseUrl' => '/yii2-cms/admin',
        ],
        
          'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,
            'rules' => [
                          '<orgname:\w+>/<orgid:\d+>/<controller:\w+>/<id:\d+>' 
                   => '<controller>/view/<id>',
           '<orgname:\w+>/<orgid:\d+>/<controller:\w+>/<action:\w+>/<id:\d+>' 
                   => '<controller>/<action>',
           '<controller:\w+>/<id:\d+>' 
                   => '<controller>/view',
           '<controller:\w+>/<action:\w+>/<id:\d+>' 
                   => '<controller>/<action>',
           '<controller:\w+>/<action:\w+>' 
                   => '<controller>/<action>',
           '<action:\w+>' 
                   => 'site/<action>',
            ],
        ],
	   'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'js' => ['js/bootstrap.js']
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
