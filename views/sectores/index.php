<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SectoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sectores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?PHP /*
            if(Yii::$app->user->identity->admin)
            {           
                echo Html::a('Agregar sector', ['create'], ['class' => 'btn btn-success']);
            }*/
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
 
            [
            'label'=>'Código',
            'attribute'=>'id',
            ],
            [
            'label'=>'Descripción',
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Gerencia',
            'attribute'=>'gerencia0.nombre',
            ],
            [
            'label'=>'Domicilio',
            'attribute'=>'direccion',
            ],
            [
            'label'=>'Encargado',
            'attribute'=>'usuario0.nombre',
            ],

            // 'telefono',
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
