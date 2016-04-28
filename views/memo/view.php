<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Memo */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Memos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memo-view">

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
            'label'=>'Gerencia',            
            'attribute'=>'gerencia0.nombre',
            ],
            [
            'label'=>'Sector',            
            'attribute'=>'sector0.nombre',
            ],
            [
            'label'=>'Area',            
            'attribute'=>'area0.nombre',
            ],

            [
            'label'=>'Nro. de memo',            
            'attribute'=>'numero',
            ],

            'titulo',
           [
            'label'=>'Detalle',
            'value'=>$model['texto']
            ],

/*
           [
            'label'=>'Detalle',
            'attribute'=>'texto',
            ],
*/            
            'tags',
            [
            'label'=>'Tiene manual',            
            'format'=>'HTML',
            'value'=>($model->manual==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            [
                'label'=>'Fecha de inicio',
                'attribute'=>'fechainicio'
            ],
            [
            'label'=>'Vigente',            
            'format'=>'HTML',
            'value'=>($model->vigente==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
        ],
    ]) ?>

</div>
