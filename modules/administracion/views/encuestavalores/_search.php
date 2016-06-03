<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EncuestavaloresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuestavalores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idencuesta') ?>

    <?= $form->field($model, 'idtipocompetencia') ?>

    <?= $form->field($model, 'individual') ?>

    <?= $form->field($model, 'general') ?>

    <?php // echo $form->field($model, 'ponderacion') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
