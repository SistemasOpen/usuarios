<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Session;

/* @var $this yii\web\View */
/* @var $model app\modules\Encuesta\models\Encuesta */

//$this->params['breadcrumbs'][] = ['label' => 'Encuesta', 'url' => ['index']];
?>

<?php 
	$funcion = Yii::$app->session['encuesta']['descfun']; 
	$idfun   = Yii::$app->session['encuesta']['idfun'];
	$idfun++;
	$session['encuesta'] = ['idfun' => $idfun];
?>	


<div class="panel panel-info"> 
	<div class="panel-heading"> 
		<H3 class="panel-title"><?= "Nivel de Desempeño sobre Competencias $funcion"; ?></H3> 
	</div> 
	<div class="panel-body"> 
		<p>Para obtener el Subtotal se suman los valores de las competencias <?= $funcion ?> y  se dividen por <?= $todos ?> </p>  
		<H3><?= "Subtotal Competencias $funcion: $puntos"; ?></H3>
	</div>
</div>

<p>
    <?= Html::a('Volver', ['/administracion/encuestas/completarencuesta','id'=>$id,'fun'=> $idfun-1], ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Siguiente', ['/administracion/encuestas/completarencuesta','id'=>$id,'fun'=> $idfun], ['class'=>'btn btn-primary']) ?>
</p>  
</div>
