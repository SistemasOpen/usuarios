<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Tipomovimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipomovimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
