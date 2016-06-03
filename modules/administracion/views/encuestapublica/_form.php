<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestapublica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuestapublica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idencuesta')->textInput() ?>

    <?= $form->field($model, 'idEvaluado')->textInput() ?>

    <?= $form->field($model, 'idEvaluador')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
