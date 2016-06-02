<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Depositosencargados */

$this->title = 'Mantenimiento de depósitos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depositosencargados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddeposito0.nombre',
            'idencargado0.nombre',
        ],
    ]) ?>

    <p>
            <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>

    </p>        


</div>
