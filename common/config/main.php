<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@uploadsdir' => '@root/uploads',
        '@uploads' => '/uploads',
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
        'thumbnail' => [
            'class' => 'common\components\ImageThumbnails'
        ]
    ],
];
