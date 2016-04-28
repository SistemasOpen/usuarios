<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestacontenido */

$this->title = 'Create Encuestacontenido';
$this->params['breadcrumbs'][] = ['label' => 'Encuestacontenidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestacontenido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
