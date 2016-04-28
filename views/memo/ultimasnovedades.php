<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Novedades';
?>
<div class="memo-index">

 
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>
        <?php // = Html::a('Imprimir', ['importarusu'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
[
            'label'=>'Codigo',
            'attribute'=>'id',
            ],
            [
            'label'=>'Fecha',
            'attribute'=>'fechainicio',
            'format' => ['date', 'php:d-m-Y']
            ],

            [
            'label'=>'Gerencia',
            'attribute'=>'gerencia',
            ],

            [
            'label'=>'Sector',
            'attribute'=>'sector',
            ],

            [
            'label'=>'Título',
            'format'=>'raw',
            'value'=> function ($model) {
                        return utf8_encode($model['titulo']);
                    },
            ],

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view}',
            'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['verdetalle', 'id'=> $model['id']]);
                    },
                ]
            ],
        ],
    ]); ?>

</div>
