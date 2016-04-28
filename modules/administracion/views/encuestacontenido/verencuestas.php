<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\EncuestaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encuestas';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuesta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['/memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'descripcion',
            [
            'label'=>'Tipo de encuesta',
            'attribute'=>'idTipoEncuesta0.descripcion',
            ],
            [ 
              'label' => 'Activa desde fecha',
                'format'    => 'HTML',
                'value'     => function ($model){
                      return date("d/m/Y",  strtotime($model->fDesde));
                       },
            ],
            [ 
              'label' => 'Activa hasta fecha',
                'format'    => 'HTML',
                'value'     => function ($model){
                      return date("d/m/Y",  strtotime($model->fHasta));
                       },
            ],

            [   
                'label'     => 'Visible',
                'format'    => 'HTML',
                'value'     => function ($model){
                      return ($model->visible==1)? '<span class="glyphicon glyphicon-ok text-success"></span>':'<span class="glyphicon glyphicon-remove text-danger"></span>';
                       },
            ],
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view} {evaluador}',
            'buttons' => [
                     'evaluador' => function ($url) {     
                                return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, [
                                        'title' => Yii::t('yii', 'Evaluador - Evaluado'),
                                ]);                                            
                              }],
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
