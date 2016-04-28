<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuesta */

/*
$this->title = 'Código de encuesta: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
*/
?>
<div class="encuesta-view">

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
                'attribute'=>'idTipoEncuesta0.descripcion',
            ],
            [ 
              'label' => 'Activa desde fecha',
              'value' => date("d-M-Y",  strtotime($model->fDesde)),
            ],
            [ 
              'label' => 'Activa hasta fecha',
              'value' => date("d-M-Y",  strtotime($model->fHasta)),
            ],
            [
            'label'=>'Visible',            
            'format'=>'HTML',
            'value'=>($model->visible==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
        ],
    ]) ?>

    <p>
        <div class="competencias">
            <?php
                    echo Html::a('Cargar conceptos', ['/administracion/encuestacontenido/armarencuesta', 'id'=>$model->id], ['class'=>'btn btn-info']);
            ?>    
        </div>
    </p>

    <p>
            <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>

    </p>        

</div>
