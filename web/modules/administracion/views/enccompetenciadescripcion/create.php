<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EncCompetenciaDescripcion */

$this->title = 'Create Enc Competencia Descripcion';
$this->params['breadcrumbs'][] = ['label' => 'Enc Competencia Descripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enc-competencia-descripcion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
