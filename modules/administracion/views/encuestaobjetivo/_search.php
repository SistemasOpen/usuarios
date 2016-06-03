<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EncuestaobjetivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuestaobjetivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idencuesta') ?>

    <?= $form->field($model, 'nivel') ?>

    <?= $form->field($model, 'texto') ?>

    <?= $form->field($model, 'recondacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
