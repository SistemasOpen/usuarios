<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Registro */

?>
<div class="registro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
