<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class CommentListAsset extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/CommentList/assets';

    public $css = [
//        'css/smoothbox/smoothbox.css',
    ];
    public $js = [
//        'js/index.js',
    ];
    public $depends = [
        'frontend\assets\ReactAsset',
    ];
}