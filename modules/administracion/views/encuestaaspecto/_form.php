<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestaaspecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuestaaspecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idencuesta')->textInput() ?>

    <?= $form->field($model, 'idtipoaspecto')->textInput() ?>

    <?= $form->field($model, 'texto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
