<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\administracion\models\Tipoencuesta;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Consignas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consignas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'idtipoencuesta')->dropDownList(ArrayHelper::map(Tipoencuesta::find()->all(), 'id', 'descripcion'))?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
