<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartamentosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamentos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?PHP /*
            if(Yii::$app->user->identity->admin)
            {           
                echo Html::a('Agregar departamento', ['create'], ['class' => 'btn btn-success']);
            }*/
        ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'nombre',
            [
            'label'=>'Gerencia',
            'attribute'=>'gerencia0.nombre',
            ],
//            'tieneareas',
            'direccion',
            // 'telefono',
            // 'mail',
            // 'encargado',
            // 'horario',
            // 'observaciones:ntext',
            // 'visible',
            [
            'label'=>'Encargado',
            'attribute'=>'usuario0.nombre',
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
