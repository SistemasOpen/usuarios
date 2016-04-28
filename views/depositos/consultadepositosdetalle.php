<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Depositos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Depositos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depositos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'label'=>'Empresa',
            'attribute'=>'empresa0.nombre',
            ],
            [
            'label'=>'Depósito',
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
        ],
    ]) ?>

</div>
