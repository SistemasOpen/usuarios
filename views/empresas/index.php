<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="btn-toolbar">
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?php 
            if(Yii::$app->user->identity->admin)
            {   
                echo Html::a('Agregar empresa', ['create'], ['class' => 'btn btn-success']); 
            }
        ?>

    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'codigo',
            'nombre',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view}',
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
