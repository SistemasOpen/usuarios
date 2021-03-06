<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Competenciadescripcion */

$this->title = $model->Texto;
$this->params['breadcrumbs'][] = ['label' => 'Competencias (Descripciones)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competenciadescripcion-view">

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
            'Texto',
            [
                'label'=>'Tipo de competencia',
                'attribute'=>'idTipoComp0.descripcion',
            ],
            [
            'label'=>'Visible',            
            'format'=>'HTML',
            'value'=>($model->visible==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
        ],
    ]) ?>

    <p>
            <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>

    </p>        

</div>
