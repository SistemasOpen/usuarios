<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use app\models\Usuario;
use app\modules\administracion\models\Encuestas;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EvaluadoEvaluador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluado-evaluador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $model->isNewRecord ? $form->field($model, 'encuesta')->dropDownList(ArrayHelper::map(Encuestas::find()->where('gerencia <> 7 and categorialegajo < 9')->all(), 'id', 'nombre')):''?> 

    <?= $form->field($model, 'evaluador')->dropDownList(ArrayHelper::map(Usuario::find()->where('departamento <> 1 and categorialegajo < 9')->all(), 'id', 'nombre'))?> 

    <?= $form->field($model, 'evaluado')->dropDownList(ArrayHelper::map(Usuario::find()->where('departamento <> 1 and categorialegajo > 8')->all(), 'id', 'nombre'))?> 

    <?= $form->field($model, 'visible')->CheckBox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
