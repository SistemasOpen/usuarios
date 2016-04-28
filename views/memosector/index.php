<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemosectorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memosectors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memosector-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Memosector', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'memo',
            'sector',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
