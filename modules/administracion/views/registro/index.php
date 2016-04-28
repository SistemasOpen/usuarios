<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\administracion\models\Tipomovimiento;
use app\modules\administracion\models\Encuestas;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\RegistroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro de operaciones con ecuuestas';
?>
<div class="registro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'usuario',
            'fecha',
            [ 'label'=>'Tipo de movimiento',
              'attribute' => 'tipomovimiento0.descripcion',
            ],
            [ 'label'=>'Encuesta',
              'attribute' => 'encuesta0.descripcion',
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
