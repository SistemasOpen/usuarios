<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administración de memos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memo-index">

    <p>
        <?php // = Html::a('Imprimir', ['importarusu'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode(utf8_decode($this->title)) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?PHP 
            if(Yii::$app->user->identity->admin)
            {           
                echo Html::a('Agregar', ['create'], ['class' => 'btn btn-success']); 
            }
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'label'=>'Gcia.',
            'attribute'=>'gerencia',
            //'style'=>['width:30px'],
            'contentOptions' => ['style'=>'width:30px'],
            ],
            [
            'label'=>'Sector',
            'attribute'=>'sector',
            //'style'=>['width:30px'],
            'contentOptions' => ['style'=>'width:30px'],
            ],
            [
            'label'=>'N. de memo',
            'attribute'=>'numero',
            //'style'=>['width:30px'],
            'contentOptions' => ['style'=>'width:30px'],
            ],
           [
            'label'=>utf8_decode('Título'),           
            'format'=>'raw',
            'value'=> function ($model) {
                        return utf8_encode($model['titulo']);
                    },

            ],            
           [
            'label'=>'Tags',
            'format'=>'raw',
            'value'=> function ($model) {
                        return utf8_encode($model['tags']);
                    },
            ],
            /*
            // 'gerencia',
            // 'sector',
            // 'area',
            // 'manual',
            // 'fechacreacion',
            // 'fechamodificacion',
            // 'fechainicio',
            // 'fechafin',
            // 'creador',
            // 'vigente',
*/
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{mostrarsectores} {view}',
            'buttons' => [
                     'mostrarsectores' => function ($url) {     
                                return Html::a('<span class="glyphicon glyphicon-ok-sign"></span>', $url, [
                                        'title' => Yii::t('yii', 'Sectores'),
                                ]);                                
            
                              }],
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],

        ],
    ]); ?>

</div>
