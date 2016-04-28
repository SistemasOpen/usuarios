<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Plantillas */

$this->title = 'Agregar plantilla';
$this->params['breadcrumbs'][] = ['label' => 'Plantillas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plantillas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'imageModel' => $imageModel,
    ]) ?>

</div>
