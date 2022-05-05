<?php


$this->title = 'My Yii Application';
?>
<div class="main-container">
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'green-sq btn-start']) ?>
    </div>

<?php ActiveForm::end(); ?>
</div>
