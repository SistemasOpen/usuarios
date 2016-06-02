<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EvaluadoEvaluador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluado-evaluador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'encuesta')->textInput() ?>

    <?= $form->field($model, 'evaluado')->textInput() ?>

    <?= $form->field($model, 'evaluador')->textInput() ?>

    <?= $form->field($model, 'visible')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
