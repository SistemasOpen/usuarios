<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\RangovalorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rangovalors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rangovalor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['/memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
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
                'label'     => 'Rango',
                'attribute' => 'rango0.descripcion',
            ],  
            'valor',
            'descripcion',
            [   
                'label'     => 'Visible',
                'format'    => 'HTML',
                'value'     => function ($model){
                      return ($model->visible==1)? '<span class="glyphicon glyphicon-ok text-success"></span>':'<span class="glyphicon glyphicon-remove text-danger"></span>';
                       },
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
