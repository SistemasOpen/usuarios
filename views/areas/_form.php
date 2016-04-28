<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use app\models\Sectores;
use app\models\Gerencias;
use app\models\Departamentos;
use app\models\Usuario;


/* @var $this yii\web\View */
/* @var $model app\models\Areas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="areas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'gerencia')->dropDownList(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre'));?>

    <?= $form->field($model, 'departamento')->dropDownList(ArrayHelper::map(Departamentos::find()->all(), 'id', 'nombre'));?>

    <?= $form->field($model, 'direccion')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'mail')->textInput() ?>

    <?= $form->field($model, 'jefe')->dropDownList(ArrayHelper::map(Usuario::find()->orderby('nombre')->all(), 'id', 'nombre'));?>
    <?php //= $form->field($model, 'encargado')->textInput() ?>

    <?= $form->field($model, 'horario')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'visible')->checkbox()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
