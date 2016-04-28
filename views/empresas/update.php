<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = 'Modificar empresa ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->codigo]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="empresas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
