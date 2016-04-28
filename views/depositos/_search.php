<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DepositosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="depositos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'empresa') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'domicilio') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'tienesectores') ?>

    <?php // echo $form->field($model, 'horario') ?>

    <?php // echo $form->field($model, 'encargado') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'correoencargado') ?>

    <?php // echo $form->field($model, 'perfil') ?>

    <?php // echo $form->field($model, 'cerrado') ?>

    <?php // echo $form->field($model, 'tipodeposito') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
