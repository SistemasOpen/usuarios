<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Rangovalor */

$this->title = 'Agregar rangos';
$this->params['breadcrumbs'][] = ['label' => 'Rangovalors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rangovalor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
