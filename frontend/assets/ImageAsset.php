<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class ImageAsset extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/ImageGallery/assets';

    public $css = [
        'css/smoothbox/smoothbox.css',
    ];
    public $js = [
        'js/smoothbox/smoothbox.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}