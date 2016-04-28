<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form ActiveForm */
?>
<div class="Usuariosimp">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'legajo') ?>
        <?= $form->field($model, 'empresa') ?>
        <?= $form->field($model, 'gerencia') ?>
        <?= $form->field($model, 'sector') ?>
        <?= $form->field($model, 'area') ?>
        <?= $form->field($model, 'categoria') ?>
        <?= $form->field($model, 'admin') ?>
        <?= $form->field($model, 'cambiapass') ?>
        <?= $form->field($model, 'documento') ?>
        <?= $form->field($model, 'activo') ?>
        <?= $form->field($model, 'nombre') ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'webpass') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'ultimoacceso') ?>
        <?= $form->field($model, 'fechamodificacion') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Usuariosimp -->
