<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Desarrollo */

$this->title = 'Agregar desarrollo';
$this->params['breadcrumbs'][] = ['label' => 'Desarrollos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desarrollo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
