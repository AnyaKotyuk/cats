<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@uploadsdir' => '@app/uploads'
    ],
    'name' => "Cat club",
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
//        'assetManager' => [
//            'bundles' => [
//                'yii\boostrap\BootstrapAsset' => [
//                    'sourcePath' => '@npm/bootstrap/dist'
//                ],
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'sourcePath' => '@npm/bootstrap/dist'
//                ]
//            ]
//        ]
    ],
];
