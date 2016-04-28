<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\EncuestaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/*
$this->title = 'Encuestas';
$this->params['breadcrumbs'][] = $this->title;
*/
$this->title = 'Encuestas borrador';
?>
<div class="encuesta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>
        <?PHP 
            if(Yii::$app->user->identity->admin)
            {           
                echo Html::a('Agregar encuesta', ['create'], ['class' => 'btn btn-success']);
            }
        ?>
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
            /*
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
            */
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Funciones',
            'template' =>'{armarencuesta} {eliminarencuesta}',
            'controller' => 'encuestacontenido',
            'buttons' => [
                     'armarencuesta' => function ($url) {     
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                        'title' => Yii::t('yii', 'Confeccionar encuestas'),
                                ]);                                            
                              },
                     'eliminarencuesta' => function ($url) {     
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('yii', 'Confeccionar encuestas'),
                                        'data-confirm' => \Yii::t('yii', 'confirma eliminar?'),
                                ]);                                            
                              }

                              ],

            'headerOptions' => ['style'=>'width:100px; text-align:center'],            
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
