<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sectores */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sectores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?php 
           // if(Yii::$app->user->identity->admin)
           // {   
                echo Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                echo Html::a('    ');
             /*   echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Está seguro de eliminar este item?',
                        'method' => 'post',
                    ],
                ]);
                */
           // }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'label'=>'Código',
            'attribute'=>'id',
            ],
            [
            'label'=>'Descripción',
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Gerencia',
            'attribute'=>'gerencia0.nombre',
            ],
            [
            'label'=>'Tiene areas',
            'format'=>'HTML',
            'value'=>($model->tieneareas==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            [
            'label'=>'Domicilio',
            'attribute'=>'direccion',
            ],
            [
            'label'=>'Teléfono',
            'attribute'=>'telefono',
            ],
            [
            'label'=>'E-mail',
            'attribute'=>'mail',
            ],
            [
            'label'=>'Encargado',
            'attribute'=>'usuario0.nombre',
            ],
            [
            'label'=>'Horario',
            'attribute'=>'horario',
            ],
            [
            'label'=>'Observaciones',
            'attribute'=>'observaciones',
            ],
            /*
            [
            'label'=>'Visible',
            'format'=>'HTML',
            'value'=>($model->visible==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            */
        ],
    ]) ?>

</div>
