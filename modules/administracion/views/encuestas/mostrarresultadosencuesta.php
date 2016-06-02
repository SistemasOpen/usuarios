<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Session;

/* @var $this yii\web\View */
/* @var $model app\modules\Encuesta\models\Encuesta */

//$this->params['breadcrumbs'][] = ['label' => 'Encuesta', 'url' => ['index']];
$funcion = Yii::$app->session['encuesta']['descfun']; 
$idfun   = Yii::$app->session['encuesta']['idfun'];

?>

<div class="panel panel-info"> 
    <div class="panel-heading"> 
        <H3 class="panel-title"><?= "Nivel General de Desempeño"; ?></H3> 
    </div> 
    <div class="panel-body"> 
        <div class="encuesta-view">
        <?= 
            GridView::widget([
            'dataProvider' => $model,
            'filterModel' => null,
            'columns' => 
            [
                'Competencia',
                'Subtotal',
                'Ponderacion',
                'Totales'
            ] ]); 
        ?>        
        </div>
    </div>
</div>
<p>
    <?= Html::a('Volver', Yii::$app->request->referrer, ['class'=>'btn btn-primary']) ?>
    <?= Html::a('Siguiente', ['encuestas/completaraspectos','id'=>$id], ['class'=>'btn btn-primary']) ?>
</p>  
