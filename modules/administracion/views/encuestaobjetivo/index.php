<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\EncuestaobjetivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encuestaobjetivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestaobjetivo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Encuestaobjetivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idencuesta',
            'nivel',
            'texto',
            'recondacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
