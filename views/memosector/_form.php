<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Memosector */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memosector-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'memo')->textInput() ?>

    <?= $form->field($model, 'sector')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
