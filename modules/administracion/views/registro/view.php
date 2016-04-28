<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\administracion\models\Tipomovimiento;
use app\modules\administracion\models\Encuestas;


/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Registro */
?>
<div class="registro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /*= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'usuario',
            'fecha',
            [ 'label'=>'Tipo de movimiento',
              'attribute' => 'tipomovimiento0.descripcion',
            ],
            [ 'label'=>'Encuesta',
              'attribute' => 'encuesta0.descripcion',
            ],
            'observaciones',
        ],
    ]) ?>
    <p>
            <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>

    </p>        


</div>
