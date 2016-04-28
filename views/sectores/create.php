<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sectores */

$this->title = 'Agregar departamento';
//$this->params['breadcrumbs'][] = ['label' => 'Sectores', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sectores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
