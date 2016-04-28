<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <p>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?php 
            if(Yii::$app->user->identity->admin)
            {   
                echo Html::a('Agregar función', ['create'], ['class' => 'btn btn-success']);
            }
        ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'label'=>utf8_decode('Código'),
            'attribute'=>'id',
            //'style'=>['width:30px'],
            'contentOptions' => ['style'=>'width:30px'],
            ],

            [
            'label'=>utf8_decode('Descripción'),
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
