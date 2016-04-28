<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuesta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoEncuesta')->textInput() ?>

    <?= $form->field($model, 'fDesde')->textInput() ?>

    <?= $form->field($model, 'fHasta')->textInput() ?>

    <?= $form->field($model, 'visible')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
