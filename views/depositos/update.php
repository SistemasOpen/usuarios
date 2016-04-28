<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Depositos */

$this->title = 'Modificar depósito: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Depositos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="depositos-update">

    <h1><?= Html::encode(utf8_decode($this->title)) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
