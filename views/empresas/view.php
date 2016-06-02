<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="btn-toolbar">
        <?php
            if(Yii::$app->user->identity->admin)
            {   
                echo Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Está seguro de eliminar este item?',
                        'method' => 'post',
                    ],
                ]);
            }
        ?>
          
     </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'label'=>utf8_decode('Código'),
            'attribute'=>'id',
            ],
            [
            'label'=>utf8_decode('Descripción'),
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Visible',
            'format'=>'HTML',
            'value'=>($model->visible==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
        ],
    ]) ?>

</div>
