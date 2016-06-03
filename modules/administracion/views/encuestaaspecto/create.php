<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestaaspecto */

$this->title = 'Create Encuestaaspecto';
$this->params['breadcrumbs'][] = ['label' => 'Encuestaaspectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestaaspecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
