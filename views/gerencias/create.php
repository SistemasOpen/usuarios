<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gerencias */

$this->title = 'Agregar gerencias';
$this->params['breadcrumbs'][] = ['label' => 'Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gerencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
