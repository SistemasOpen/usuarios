<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuestavalores */

$this->title = 'Create Encuestavalores';
$this->params['breadcrumbs'][] = ['label' => 'Encuestavalores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestavalores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
