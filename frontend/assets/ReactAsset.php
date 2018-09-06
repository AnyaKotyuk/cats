<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ReactAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [];
    public $js = [
        'js/react/dist/main.js',

//        'js/react/src/index.js',
//        '//unpkg.com/react@16/umd/react.production.min.js',
//        '//unpkg.com/react-dom@16/umd/react-dom.production.min.js',
//        '//cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.25.0/babel.min.js',
    ];
    public $depends = [];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];


}