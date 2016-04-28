<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Funciones */

$this->title = 'Modificar función: ' . ' ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Funciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descripcion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="funciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
