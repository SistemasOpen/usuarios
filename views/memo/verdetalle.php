<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Memo */

//$geren = 'gerencia0.nombre';
 //           [
 //           'label'=>'Gerencia',            
 //           'attribute'=>'gerencia0.nombre',
 //           ];

$this->title = $model->titulo;

//$this->params['breadcrumbs'][] = ['label' => 'Memos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memo-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <h2><?= $model->gerencia0->nombre . " - " . $model->sector0->nombre ?></h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'numero',
            [
                'label'=>'Detalle',
                'value'=>utf8_encode($model->texto),
            ]
        ],
    ]) ?>
    <?= Html::a('Volver', ['ultimasnovedades'], ['class' => 'btn btn-success']) ?>


</div>
