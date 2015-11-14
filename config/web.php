<?php
require_once(__DIR__ . '/../functions.php');
$params   = require(__DIR__ . '/params.php');
$urlRules = require(__DIR__ . '/urlRules.php');


$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'yii2Extended',
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue',
                ],
            ],
        ],
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
            'traceLevel' => isDevExecuting() ? 3 : 0,
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
            'rules'           => $urlRules,
        ],
    ],
    'modules' => [
        'yii2Extended' =>  [
            'class' => 'app\modules\yii2Extended\Module',
        ],
        'landConstructor' =>  [
            'class' => 'app\landConstructor\Module',
        ],
    ],
    'params' => $params,
];

$dev = isDevExecuting();
if($dev)
{
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];

    $devConf = require('conf.'.$dev.'.php');
    $config = arrayMerge($config, $devConf);
}

return $config;
