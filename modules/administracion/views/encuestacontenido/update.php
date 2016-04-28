<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestacontenido */

$this->title = 'Update Encuestacontenido: ' . ' ' . $model->idCompetencia;
$this->params['breadcrumbs'][] = ['label' => 'Encuestacontenidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCompetencia, 'url' => ['view', 'idCompetencia' => $model->idCompetencia, 'idEncuesta' => $model->idEncuesta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encuestacontenido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
