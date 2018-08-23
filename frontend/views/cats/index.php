<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <?= Html::a('Create new pet', Url::to('cats/create'), ['class' => 'btn btn-primary pull-right']); ?>
    </div>
</div>
<hr>
<div class="row">
    <?php
    if (!empty($pets)) { ?>
            <?php foreach ($pets as $pet) { ?>
                <div class="col-md-6">
                    <a href="<?= Url::to(['cats/view', 'name' => $pet->name]) ?>">
                        <img src="<?= ($pet->picture)?Url::to('@uploads/'.$pet->picture):'/images/default-cat.jpg' ?>">
                        <h3><?= $pet->name;?></h3>
                        <div><?= $pet->description;?></div>
                    </a>
                </div>
            <?php } ?>
    <?php } else { ?>
        <p>No cats</p>
    <?php } ?>
</div>


