<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestacontenido */

$this->title = $model->idCompetencia;
$this->params['breadcrumbs'][] = ['label' => 'Encuestacontenidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestacontenido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCompetencia' => $model->idCompetencia, 'idEncuesta' => $model->idEncuesta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCompetencia' => $model->idCompetencia, 'idEncuesta' => $model->idEncuesta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEncuesta',
            'idCompetencia',
            'tipocompetencia',
        ],
    ]) ?>

</div>
