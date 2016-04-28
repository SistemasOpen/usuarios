<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepositosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Depositos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depositos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'label'=>utf8_decode('Nro Depósito'),
            'attribute'=>'codigo',
            //'style'=>['width:30px'],
            'contentOptions' => ['style'=>'width:30px'],
            ],
            [
            'label'=>utf8_decode('Depósito'),
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Domicilio',
            'attribute'=>'domicilio',
            ],
            [
            'label'=>'Localidad',
            'attribute'=>'localidad',
            ],
            [
            'label'=>'Empresa',
            'attribute'=>'empresa0.nombre',
            ],
            // 'localidad',
            // 'telefono',
            // 'celular',
            // 'tienesectores',
            // 'horario',
            // 'encargado',
            // 'correo',
            // 'correoencargado',
            // 'perfil',
            // 'cerrado',
            // 'tipodeposito',
            // 'observaciones',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view}',
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],
            
        ],
    ]); ?>

</div>

