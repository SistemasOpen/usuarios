<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorias */

$this->title = 'Modificar categoría: ' . ' ' . $model->Descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Descripcion, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="categorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
