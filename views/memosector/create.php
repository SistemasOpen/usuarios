<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Memosector */

$this->title = 'Create Memosector';
$this->params['breadcrumbs'][] = ['label' => 'Memosectors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memosector-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
