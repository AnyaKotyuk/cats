<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;

?>
<div class="row">
    <div class="col-md-12">
        <?= Html::a('Create new pet', Url::to('/cats/create'), ['class' => 'btn btn-primary pull-right']); ?>
    </div>
</div>
<hr>
<div class="row">
    <?php
    if (!empty($pets)) { ?>
            <?php foreach ($pets as $pet) { ?>
                <div class="col-md-6">
                    <img src="<?= Yii::$app->thumbnail->get($pet->picture, [300, 200]) ?>">
                    <h3>
                        <a href="<?= Url::to(['cats/view', 'name' => $pet->name]) ?>"><?= $pet->name;?></a>
                    </h3>
                    <p><b>Published at:</b> <?= Yii::$app->formatter->asDate($pet->publish_date, 'php:d/m/Y H:i') ?></p>
                    <div><?= StringHelper::truncate($pet->description, 150, '...');?></div>
                </div>
            <?php } ?>
    <?php } else { ?>
        <p>No cats</p>
    <?php } ?>
</div>


