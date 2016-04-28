<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'texto') ?>

    <?= $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'gerencia') ?>

    <?php // echo $form->field($model, 'sector') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'manual') ?>

    <?php // echo $form->field($model, 'fechacreacion') ?>

    <?php // echo $form->field($model, 'fechamodificacion') ?>

    <?php // echo $form->field($model, 'fechainicio') ?>

    <?php // echo $form->field($model, 'fechafin') ?>

    <?php // echo $form->field($model, 'creador') ?>

    <?php // echo $form->field($model, 'vigente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
