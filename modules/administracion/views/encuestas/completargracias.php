<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class='encuesta-form'>

	<div class="panel panel-info"> 
		<div class="panel-heading"> 
			<H3 class="panel-title"><?= "Encuesta completa"; ?></H3> 
		</div> 
		<div class="panel-body"> 
			<H3>Muchas gracias por completar la Encuesta</H3>
		</div>
	</div>
</div>
<p>
    <?= Html::a('Finalizar y Grabar la Encuesta', ['encuestas/finalizarencuesta','id'=>$id], ['class'=>'btn btn-primary']) ?>
</p>  