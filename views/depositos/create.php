<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Depositos */

$this->title = 'Agregar Depósito';
$this->params['breadcrumbs'][] = ['label' => 'Depositos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depositos-create">

    <h1><?= Html::encode(utf8_decode($this->title)) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
