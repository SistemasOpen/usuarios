<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\EncuestavaloresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encuestavalores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestavalores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Encuestavalores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idencuesta',
            'idtipocompetencia',
            'individual',
            'general',
            // 'ponderacion',
            // 'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
