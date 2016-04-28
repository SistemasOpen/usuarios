<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Memosector */

$this->title = $model->memo;
$this->params['breadcrumbs'][] = ['label' => 'Memosectors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memosector-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'memo' => $model->memo, 'sector' => $model->sector], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'memo' => $model->memo, 'sector' => $model->sector], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'memo',
            'sector',
        ],
    ]) ?>

</div>
