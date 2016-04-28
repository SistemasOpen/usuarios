<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EncRango */

$this->title = 'Create Enc Rango';
$this->params['breadcrumbs'][] = ['label' => 'Enc Rangos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enc-rango-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
