<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Tipoencuesta */

$this->title = 'Agregar tipo de encuesta';
$this->params['breadcrumbs'][] = ['label' => 'Tipoencuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoencuesta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
