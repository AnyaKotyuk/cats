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
    ];
    public $depends = [];

}