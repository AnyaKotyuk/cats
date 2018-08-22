<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h2><?php echo Yii::t('app', 'Create ew pet'); ?></h2>
<?php $form = ActiveForm::begin();
echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'description')->textarea();
echo $form->field($model, 'picture')->fileInput();
?>
<?php echo Html::submitButton('Create');
$form = ActiveForm::end();