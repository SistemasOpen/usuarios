<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Gerencias;


/* @var $this yii\web\View */
/* @var $searchModel app\models\GerenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gerencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gerencias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?php 
            if(Yii::$app->user->identity->admin)
            {   
                echo Html::a('Agregar gerencia', ['create'], ['class' => 'btn btn-success']); 
            }
        ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'label'=>'Código',
            'attribute'=>'id',
            'contentOptions' => ['style'=>'width:60px'],
            ],
            [
            'label'=>'Descripción',
            'attribute'=>'nombre',
            ],
            [
            'label'=>'E-mail',
            'attribute'=>'mail',
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
