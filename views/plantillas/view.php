<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\file\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Plantillas */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Plantillas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plantillas-view">

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
            'label'=>'Código',
            'attribute'=>'id',
            ],
            [
            'label'=>'Descripción',
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Detalle',
            'attribute'=>'descripcion',
            ],
            'tipoarchivo',
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
        ],

    ]);
/*        echo FileInput::widget([
            'name' => 'attachment_49[]',
            'options'=>[
                'multiple'=>false
            ],
            'pluginOptions' => [
                'initialPreview'=>[
                    Html::img("/Files/p" . $model->id . '.pdf', ['class'=>'file-preview-image']),
                ],
                'overwriteInitial'=>false
            ]
        ]);
*/
//        echo Html::a('Link', ['/site/test'], ['target'=>'_blank']);
        echo Html::a('Ver pdf', 'plantillas/p' . $model->id . '.pdf', ['class' => 'btn btn-info', 'target'=>'_blank']);

     ?>
</div>
