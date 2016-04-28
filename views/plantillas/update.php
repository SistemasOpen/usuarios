<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Plantillas */

$this->title = 'Modificar plantilla: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Plantillas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="plantillas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'imageModel' => $imageModel,
    ]) ?>

</div>
