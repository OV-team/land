<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'U24mYXtm2UnEs4G5cTxsTDhoVwvVgfdL',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => isStuff() ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'class'           => 'yii\web\UrlManager',
            'showScriptName'  => false,
            'enablePrettyUrl' => true,
            'rules'           => array(
                '/' => 'site/index',

                '<controller:\w+>'                       => '<controller>/index',
                '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
            ),
        ],
    ],
    'modules' => [
        'yii2ext' =>  [
            'class' => 'olgert\yii2\Module',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
//            'export' => false,
        ]
    ],
    'params' => $params,
];

$config['bootstrap'][] = 'yii2ext';

if (isStuff()) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

$dev = isDevExecuting();
if($dev)
{
    $devConf = require('conf.'.$dev.'.php');
    $config = arrayMerge($config, $devConf);
}

return $config;
