<?php
use yii\helpers\Url;

?>
<div class="row">
    <?php
    if (!empty($pets)) { ?>

            <?php foreach ($pets as $pet) { ?>
                <div class="col-md-6">
                    <img src="<?= ($pet->picture)?Url::to('@uploads/'.$pet->picture):'/images/default-cat.jpg' ?>">
                    <h3><?= $pet->name;?></h3>
                    <div><?= $pet->description;?></div>
                </div>
            <?php } ?>
    <?php } else { ?>
        <p>No cats</p>
    <?php } ?>
</div>


