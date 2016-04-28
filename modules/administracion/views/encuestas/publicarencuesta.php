<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\datecontrol\DateControl;
use app\modules\administracion\models\Tipoencuesta;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuesta */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Publicar encuesta: ' . ' ' . $model->descripcion;
/*
$this->params['breadcrumbs'][] = ['label' => 'Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descripcion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
*/
?>
<div class="encuesta-update">

    <h1><?= Html::encode($this->title) ?></h1>

</div>

<div class="encuesta-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'fDesde')->widget(DateControl::classname(), [

        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'php:D, d-M-Y',
        'language'=>'es',
        'options' => [
            'pluginOptions' => [
            'autoclose' => true
            ]
        ]
    ]);
    ?>

     <?= $form->field($model, 'fHasta')->widget(DateControl::classname(), [

        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'php:D, d-M-Y',
        'language'=>'es',
        'options' => [
            'pluginOptions' => [
            'autoclose' => true
            ]
        ]
    ]);
    ?>

    <?= $form->field($model, 'visible')->checkbox()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
