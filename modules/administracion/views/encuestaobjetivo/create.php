<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestaobjetivo */

$this->title = 'Create Encuestaobjetivo';
$this->params['breadcrumbs'][] = ['label' => 'Encuestaobjetivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestaobjetivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
