<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Depositosencargados */

$this->title = 'Mantenimiento de depósitos';
$this->params['breadcrumbs'][] = 'Modificación';
?>
<div class="depositosencargados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
