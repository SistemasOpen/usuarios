<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Empresas;

/* @var $this yii\web\View */
/* @var $model app\models\Depositos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="depositos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'empresa')->dropDownList(ArrayHelper::map(Empresas::find()->all(), 'codigo', 'nombre')); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'domicilio')->textInput() ?>

    <?= $form->field($model, 'localidad')->textInput() ?>

    <?= $form->field($model, 'codigopostal')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'celular')->textInput() ?>

    <?= $form->field($model, 'tienesectores')->checkbox() ?>

    <?= $form->field($model, 'horario')->textInput() ?>

    <?= $form->field($model, 'encargado')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput() ?>

    <?= $form->field($model, 'correoencargado')->textInput() ?>

    <?= $form->field($model, 'perfil')->dropDownList(['Linea'=>'Linea', 'Premium'=>'Premium', 'Outlet'=>'Outlet']);?>
 
    <?= $form->field($model, 'cerrado')->checkbox() ?>

    <?= $form->field($model, 'tipodeposito')->dropDownList(['1'=>'Propio', '2'=>'Franquicia']);?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

    <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$onClickArt=$this->registerJs(" 

$(document).ready(function() {

    
})
");
?>
