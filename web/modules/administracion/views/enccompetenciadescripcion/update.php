<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EncCompetenciaDescripcion */

$this->title = 'Update Enc Competencia Descripcion: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Enc Competencia Descripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enc-competencia-descripcion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
