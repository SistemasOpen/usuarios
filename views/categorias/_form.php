<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descripcion')->textInput() ?>

    <?= $form->field($model, 'Orden')->textInput() ?>

    <?php //= $form->field($model, 'Visible')->checkbox() ?>

    <?php //= $form->field($model, 'Evaluado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php //= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
