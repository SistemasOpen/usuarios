<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestavalores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuestavalores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idencuesta')->textInput() ?>

    <?= $form->field($model, 'idtipocompetencia')->textInput() ?>

    <?= $form->field($model, 'individual')->textInput() ?>

    <?= $form->field($model, 'general')->textInput() ?>

    <?= $form->field($model, 'ponderacion')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
