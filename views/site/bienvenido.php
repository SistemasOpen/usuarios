<?php

use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Bienvenido' ;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="usuario-index">

 
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>
        <?php // = Html::a('Imprimir', ['importarusu'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id','legajo','empresa','nombre','activo'
        ],
    ]); ?>

</div>
