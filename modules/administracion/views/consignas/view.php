<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Consignas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Consignas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consignas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?php
            if(Yii::$app->user->identity->admin)
            {   
                echo Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                echo Html::a('    ');
                echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Está seguro de eliminar este item?',
                        'method' => 'post',
                    ],
                ]);
            }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'descripcion',
            [
                'label'=>'Tipo de encuesta',
                'attribute'=>'idtipoencuesta0.descripcion',
            ],
        ],
    ]) ?>

    <p>
            <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>

    </p>        

</div>
