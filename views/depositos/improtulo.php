
<?php

use yii\helpers\Html;
// use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Depositos */

?>
<div class="depositos-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <h1> Para: </h1>  
    <h1 class="kv-heading-1"> <strong>Open Sports</strong> </h1>
    <h1 class="kv-heading-2"> <strong>Destino:</strong> <?php echo $model->nombre ?></h1>
    <h1 class="kv-heading-3"> <strong>Domcilio:</strong> <?php echo $model->domicilio ?></h1>
    <h1 class="kv-heading-3"> <strong>Localidad:</strong> <?php echo $model->localidad ?></h1>
    <h1 class="kv-heading-3"> <strong>Teléfono:</strong> <?php echo $model->telefono ?></h1>
    <hr> 
    <h1> De: </h1>  
    <h2 > <strong>Open Sports</strong> </h2>
    <h2 > <strong>Destino:</strong> <?php echo $modelo->nombre ?></h2>
    <h2 > <strong>Domcilio:</strong> <?php echo $modelo->domicilio ?></h2>
    <h2 > <strong>Localidad:</strong> <?php echo $modelo->localidad ?></h2>
    <h2 > <strong>Teléfono:</strong> <?php echo $modelo->telefono ?></h2>
        
    <?php // = DetailView::widget([
      /*  'model' => $model,
        'attributes' => [
            [
                'label'=>'Depósito',
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
        ],
    ]) */?>

</div>
