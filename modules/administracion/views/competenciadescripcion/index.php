<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\CompetenciadescripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Competencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competenciadescripcion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <div class="btn-toolbar">
        <?= Html::a('Volver', ['/memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?PHP 
            if(Yii::$app->user->identity->admin)
            {           
                echo Html::a('Agregar', ['create'], ['class' => 'btn btn-success']);
            }
        ?>
        </div>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [   'label'=>'Texto',
                'format'=>'raw',
                'value'=> function ($model) {
                    return utf8_encode($model['texto']);
                },
            ],
             //'idTipoComp0.descripcion',
            [   
                'label'     => 'Visible',
                'format'    => 'HTML',
                'value'     => function ($model){
                      return ($model->visible==1)? '<span class="glyphicon glyphicon-ok text-success"></span>':'<span class="glyphicon glyphicon-remove text-danger"></span>';
                       },
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
