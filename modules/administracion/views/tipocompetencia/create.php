<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Tipocompetencia */

$this->title = 'Tipos de competencia';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de competencia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipocompetencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
