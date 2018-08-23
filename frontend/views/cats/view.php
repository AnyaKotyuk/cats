<?php


?>

<div class="row">
    <div class="col-md-6">
        <img src="<?= Yii::$app->thumbnail->get($cat->picture, [600, 400]) ?>">
    </div>
    <div class="col-md-6">
        <h3><?= $cat->name ?></h3>
        <p><b>Published at:</b> <?= Yii::$app->formatter->asDate($cat->publish_date, 'php:d/m/Y H:i') ?></p>
        <div>
            <?= $cat->description ?>
        </div>
    </div>
</div>