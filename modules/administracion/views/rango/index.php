<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\RangoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mantenimiento de rangos de encuesta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rango-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['/memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?PHP 
            if(Yii::$app->user->identity->admin)
            {           
                echo Html::a('Agregar rango de encuesta', ['create'], ['class' => 'btn btn-success']);
            }
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'descripcion',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view}',
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
        ],
    ]); ?>

</div>
