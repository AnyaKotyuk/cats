<?php

use yii\helpers\Html;
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
<div class="comments">
    <?= Html::a("add comment", ['/comments/add', 'cat_id' => $cat->id], ['class' => 'btn btn-primary']) ?>
    <?php if(!empty($comments)) { ?>
        <hr>
        <ul>
            <?php foreach ($comments as $comment) { ?>
                <li><?= $comment->text ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>