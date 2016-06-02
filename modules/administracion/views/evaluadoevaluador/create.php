<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EvaluadoEvaluador */

$this->title = 'Create Evaluado Evaluador';
$this->params['breadcrumbs'][] = ['label' => 'Evaluado Evaluadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluado-evaluador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
