<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Puestos */

$this->title = 'Agregar puesto';
$this->params['breadcrumbs'][] = ['label' => 'Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puestos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
