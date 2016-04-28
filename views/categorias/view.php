<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categorias */

$this->title = $model->Descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
            //if(Yii::$app->user->identity->admin)
            //{   
                echo Html::a('Modificar', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']);
                echo Html::a('    ');
                echo Html::a('Eliminar', ['delete', 'id' => $model->Id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Está seguro de eliminar este item?',
                        'method' => 'post',
                    ],
                ]);
            //}
        ?>
            
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'label'=>'Código',
            'attribute'=>'Id',
            ],
            [
            'label'=>'Descripción',
            'attribute'=>'Descripcion',
            ],
            'Orden',
            /*
            [
            'label'=>'Visible',            
            'format'=>'HTML',
            'value'=>($model->Visible==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            [
            'label'=>'Puede ser evaluada',            
            'format'=>'HTML',
            'value'=>($model->Evaluado==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            */
        ],
    ]) ?>

    <p>
        <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>
    </p>  

</div>
