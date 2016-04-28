<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\administracion\models\Tipocompetencia;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Competenciadescripcion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competenciadescripcion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Texto')->textInput() ?>

    <?= $form->field($model, 'idTipoComp')->dropDownList(ArrayHelper::map(Tipocompetencia::find()->all(), 'id', 'descripcion'))?> 

    <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
