<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sectores */

$this->title = 'Modifica departamento ' . ' ' . $model->nombre;
//$this->params['breadcrumbs'][] = ['label' => 'Sectores', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="sectores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
