<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Consignas */

$this->title = 'Agregar';
$this->params['breadcrumbs'][] = ['label' => 'Consignas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consignas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
