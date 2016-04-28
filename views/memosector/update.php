<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Memosector */

$this->title = 'Update Memosector: ' . ' ' . $model->memo;
$this->params['breadcrumbs'][] = ['label' => 'Memosectors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->memo, 'url' => ['view', 'memo' => $model->memo, 'sector' => $model->sector]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="memosector-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
