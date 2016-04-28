<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Tipocompetencia */

$this->title = 'Modificar Tipos de competencia: ' . ' ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Tipos de competencia', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descripcion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipocompetencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
