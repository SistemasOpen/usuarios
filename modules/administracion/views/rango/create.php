<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Rango */

$this->title = 'Agregar rango';
$this->params['breadcrumbs'][] = ['label' => 'Rangos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rango-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
