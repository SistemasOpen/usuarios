<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Depositos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Depositos', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depositos-view">

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
            [
            'label'=>'Empresa',
            'attribute'=>'empresa0.nombre',
            ],
            [
            'label'=>utf8_decode('Depósito'),
            'attribute'=>'codigo',
            ],
            [
                'label'=>'Detalle',
                'value'=>utf8_encode($model->nombre),
            ],
            [
                'label'=>'Domicilio',
                'value'=>utf8_encode($model->domicilio),
            ],
            [
                'label'=>'Localidad',
                'value'=>utf8_encode($model->localidad),
            ],
            'codigopostal',
            'telefono',
            'celular',
            [
                'label'=>'Horario',
                'value'=>utf8_encode($model->horario),
            ],
            'encargado',
            [
            'label'=>'Email del local',
            'attribute'=>'correo',
            ],
            [
            'label'=>'Email encargado',
            'attribute'=>'correoencargado',
            ],
            'perfil',
            [
            'label'=>'Cerrado',            
            'format'=>'HTML',
            'value'=>($model->cerrado==1)?'<h4><span class="label label-warning">Cerrado</span>':'<span class="label label-primary">Abierto</span></h4>',
            ],
            [
            'label'=>'Tipo de depósito',            
            'format'=>'HTML',
            'value'=>($model->tipodeposito==1)?'<h4><span class="label label-primary">Propio</span>':'<span class="label label-warning">Franquicia</span></h4>',
            ],
            'observaciones',
            [
            'label'=>'Visible',            
            'format'=>'HTML',
            'value'=>($model->visible==0)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
        ],
    ]) ?>

    <p>
            <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>

    </p>        

</div>
