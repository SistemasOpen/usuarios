<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


            $meses[]="Enero";
            $meses[]="Febrero";
            $meses[]="Marzo";
            $meses[]="Abril";
            $meses[]="Mayo";
            $meses[]="Junio";
            $meses[]="Julio";
            $meses[]="Agosto";
            $meses[]="Septiembre";
            $meses[]="Octubre";
            $meses[]="Noviembre";
            $meses[]="Diciembre";

$this->title = 'Cumpleaños del mes '. $meses[date('n')-1] ;
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

 
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?php // = Html::a('Imprimir', ['importarusu'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            'label'=>'Sucursal',
            'attribute'=>'sector',
            ],
            [
            'label'=>'Area',
            'attribute'=>'area',
            ],
            [
            'label'=>'Día',
            'attribute'=>'fechanacimiento',
            ],
 
        ],
    ]); ?>

</div>
