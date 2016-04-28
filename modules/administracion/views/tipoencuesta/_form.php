<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\administracion\models\Rango;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Tipoencuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipoencuesta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'idRango')->dropDownList(ArrayHelper::map(Rango::find()->all(), 'id', 'descripcion')) ?>

    <?= $form->field($model, 'esFuncional')->checkbox()?>

    <?= $form->field($model, 'esAnonima')->checkbox()?>

    <?= $form->field($model, 'visible')->checkbox()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
