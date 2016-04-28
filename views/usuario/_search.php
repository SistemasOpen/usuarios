<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'legajo') ?>

    <?= $form->field($model, 'empresa') ?>

    <?= $form->field($model, 'gerencia') ?>

    <?= $form->field($model, 'sector') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'categoria') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'webpass') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'admin') ?>

    <?php // echo $form->field($model, 'cambiapass') ?>

    <?php // echo $form->field($model, 'ultimoacceso') ?>

    <?php // echo $form->field($model, 'documento') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'fechamodificacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
