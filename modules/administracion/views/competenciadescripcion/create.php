<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Competenciadescripcion */

//$this->title = 'Create Competenciadescripcion';
$this->params['breadcrumbs'][] = ['label' => 'Competenciadescripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competenciadescripcion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
