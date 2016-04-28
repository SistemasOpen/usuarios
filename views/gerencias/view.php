<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gerencias */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Gerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gerencias-view">

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
            'label'=>'Tiene jefe',
            'format'=>'HTML',
            'value'=>($model->jefe==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            [
            'label'=>'E-mail',
            'attribute'=>'mail',
            ],
            [
            'label'=>'Visible',
            'format'=>'HTML',
            'value'=>($model->visible==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
        ],
    ]) ?>

</div>
