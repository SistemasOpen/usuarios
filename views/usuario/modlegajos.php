<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mantenimiento de usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

          <?PHP if (Yii::$app->getSession()->getFlash('success'))
            {?>
            <hr style="clear:both;">
            <div class="alert alert-success">
            <?=Yii::$app->getSession()->getFlash('success');?>
            </div>
          <?PHP } ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            [
            'label'=>'Legajo',
            'attribute'=>'legajo',
            //'style'=>['width:30px'],
            'contentOptions' => ['style'=>'width:100px'],
            ],
            [
            'label'=>'Apellido y nombre',
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Empresa',
            'attribute'=>'empresa0.nombre',
            ],
            // 'area',
            // 'categoria',
            // 'nombre',
            // 'username',
            // 'webpass',
            // 'password',
            // 'admin',
            // 'cambiapass',
            // 'ultimoacceso',
            // 'documento',
            // 'activo',
            // 'fechamodificacion',
            [
            'label'=>'Fecha de alta',
            'attribute'=>'fechaalta',
            ],

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{completardatos}',
            'buttons' => [
                     'completardatos' => function ($url) {     
                                return Html::a('<span class="glyphicon glyphicon-ok-sign"></span>', $url, [
                                        'title' => Yii::t('yii', 'Completar datos'),
                                ]);                                
            
                              }],
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
