<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mantenimiento de categorías';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?php 
            //if(Yii::$app->user->identity->admin)
            //{   
                echo Html::a('Agregar categoría', ['create'], ['class' => 'btn btn-success']);
            //}
        ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'label'=>'Código',
            'attribute'=>'Id',
            //'style'=>['width:30px'],
            'contentOptions' => ['style'=>'width:30px'],
            ],

            [
            'label'=>'Descripción',
            'attribute'=>'Descripcion',
            ],
            'Orden',
/*
            [   
                'label'     => 'Visible',
                'format'    => 'HTML',
                'value'     => function ($model){
                      return ($model->Visible==1)? '<span class="glyphicon glyphicon-ok text-success"></span>':
                        '<span class="glyphicon glyphicon-remove text-danger"></span>';
                       },
            ],

            [   
                'label'     => 'Puede ser evaluada',
                'format'    => 'HTML',
                'value'     => function ($model){
                      return ($model->Evaluado==1)? '<span class="glyphicon glyphicon-ok text-success"></span>':
                        '<span class="glyphicon glyphicon-remove text-danger"></span>';
                       },
            ],
*/
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view}',
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
