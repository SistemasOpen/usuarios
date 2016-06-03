<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestapublica */

$this->title = 'Create Encuestapublica';
$this->params['breadcrumbs'][] = ['label' => 'Encuestapublicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestapublica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
