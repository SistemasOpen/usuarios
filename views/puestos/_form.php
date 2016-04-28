<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Puestos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="puestos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php //= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>
   </div>

    <?php ActiveForm::end(); ?>

</div>
