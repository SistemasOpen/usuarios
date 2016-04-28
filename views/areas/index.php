<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AreasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administración de áreas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="areas-index">

    <h1><?= Html::encode(utf8_decode($this->title)) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?PHP /*
            if(Yii::$app->user->identity->admin)
            {           
                echo Html::a('Agregar', ['create'], ['class' => 'btn btn-success']);
            }*/
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'label'=>utf8_decode('Código'),
            'attribute'=>'id',
            ],
            [
            'label'=>utf8_decode('Descripción'),
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Gerencia',
            'attribute'=>'gerencia0.nombre',
            ],
            [
            'label'=>'Departamento',
            'attribute'=>'departamento0.nombre',
            ],
            [
            'label'=>'Domicilio',
            'attribute'=>'direccion',
            ],
            [
            'label'=>utf8_decode('Teléfono'),
            'attribute'=>'telefono',
            ],
            // 'mail',
            // 'encargado',
            // 'horario',
            // 'observaciones:ntext',
            // 'visible',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view}',
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
