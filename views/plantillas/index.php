<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlantillasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plantillas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plantillas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar plantilla', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
            'label'=>'Código',
            'attribute'=>'id',
            ],
            [
            'label'=>'Descripción',
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Detalle',
            'attribute'=>'descripcion',
            ],

           ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view}',
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
