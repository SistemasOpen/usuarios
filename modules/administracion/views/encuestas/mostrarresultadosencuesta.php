<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Session;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Encuesta\models\Encuesta */

//$this->params['breadcrumbs'][] = ['label' => 'Encuesta', 'url' => ['index']];
$funcion = Yii::$app->session['encuesta']['descfun']; 
$idfun   = Yii::$app->session['encuesta']['idfun'];

?>

<div class="aspectos-form">

    <?php 
    $form = ActiveForm::begin(['action'=> ['encuestas/grabarresultados']]); ?>
        <input type='hidden' id='idEncuesta' name='idEncuesta' value='<?=$id?>'/>
        <div class="panel panel-info"> 
            <div class="panel-heading"> 
                <H3 class="panel-title"><?= "Nivel General de Desempeño"; ?></H3> 
            </div> 
            <div class="panel-body"> 
                <div class="encuesta-view">
                <?= GridView::widget([
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
            
        <div class="form-group">
            <?= Html::a('Volver', Yii::$app->request->referrer, ['class'=>'btn btn-primary']) ?>
            <?= Html::submitButton('Siguiente', ['class' => 'btn btn-primary']) ?>
        </div>
    
    <?php ActiveForm::end(); ?>
</div>