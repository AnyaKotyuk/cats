<?php

/* @var $cat \common\models\Cats */
use frontend\widgets\ImageGallery\ImageGalleryWidget;
use yii\helpers\ArrayHelper;

$this->title = 'My Yii Application';

$this->beginBlock('before_content'); ?>
<div class="container-fluid home-gallery">
        <?php
        $images = ArrayHelper::toArray($cats, [
            'common\models\Cats' => [
                'content' => function($cats) {
                    return '<img src="'.Yii::$app->thumbnail->get($cats->picture, [400, 300]).'">';
                },
                'title' => 'description',
                'src' => function($cats) {
                    return Yii::$app->thumbnail->get($cats->picture, 'full');
                },
            ]
        ]);
        echo ImageGalleryWidget::widget([
                'images' => $images
        ]) ?>
    </div>
<?php
$this->endBlock();
?>
<div class="site-index">
    <div class="body-content">

        Welcome! We are glad you would like to explore a different type of pet care for your furry friends. We have been providing top-notch pet sitting and pet care in the Littleton community since 1995 and the Best Choice as an alternative to pet boarding

        There are many advantages of your pet staying in their own home. Some of them are; no exposure to illnesses such as kennel cough, canine flu, & parasites.

    </div>
</div>
