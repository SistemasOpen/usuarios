<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administracion\models\DepositosencargadosSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Depositosencargados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depositosencargados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Depositosencargados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'iddeposito',
            'idencargado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
