<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\administracion\models\Competenciadescripcion;
use app\models\Categorias;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Desarrollo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desarrollo-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'idCompetencia')->dropDownList(ArrayHelper::map(Competenciadescripcion::find()->all(), 'id', 'Texto'))?> 

    <?= $form->field($model, 'valor_desarrollo')->textInput() ?>

    <?= $form->field($model, 'idCategoria_usuario')->dropDownList(ArrayHelper::map(Categorias::find()->all(), 'Id', 'Descripcion'))?> 

    <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
