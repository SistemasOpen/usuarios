<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Funciones */

$this->title = 'Agregar función';
$this->params['breadcrumbs'][] = ['label' => 'Funciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funciones-create">

    <h1><?= Html::encode(utf8_decode($this->title)) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
