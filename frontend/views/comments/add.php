<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();
echo $form->field($comment, 'text')->textarea();

echo Html::submitButton();
ActiveForm::end();