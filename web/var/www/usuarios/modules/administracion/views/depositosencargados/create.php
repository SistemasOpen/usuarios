<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Depositosencargados */

$this->title = 'Create Depositosencargados';
$this->params['breadcrumbs'][] = ['label' => 'Depositosencargados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depositosencargados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
