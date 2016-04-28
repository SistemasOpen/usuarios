<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Rangovalor */

$this->title = 'Modificar rangos' . ' ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Rangos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descripcion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="rangovalor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
