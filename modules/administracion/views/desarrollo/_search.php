<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\DesarrolloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desarrollo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idCompetencia') ?>

    <?= $form->field($model, 'valor_desarrollo') ?>

    <?= $form->field($model, 'idCategoria_usuario') ?>

    <?= $form->field($model, 'visible') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
