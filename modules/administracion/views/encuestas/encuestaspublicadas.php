<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\EncuestaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/*
$this->params['breadcrumbs'][] = $this->title;
*/
$this->title = 'Encuestas publicadas';
?>

          <?PHP if (Yii::$app->getSession()->getFlash('success'))
            {?>
            <hr style="clear:both;">
            <div class="alert alert-success">
            <?=Yii::$app->getSession()->getFlash('success');?>
            </div>
          <?PHP } ?>

<div class="encuesta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>
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
                       
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Funciones',
            'template' =>'{cancelarpublicacion}',
//            'controller' => 'encuestacontenido',
            'buttons' => [
                     'cancelarpublicacion' => function ($url) {     
                                return Html::a('<span class="glyphicon glyphicon-remove-circle"></span>', $url, [
                                        'title' => Yii::t('yii', 'Confeccionar encuestas'),
                                        'data-confirm' => \Yii::t('yii', 'confirma cancelar la publicación de la encuesta?'),                                        
                                ]);                                            
                              },],

            'headerOptions' => ['style'=>'width:100px; text-align:center'],            
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
