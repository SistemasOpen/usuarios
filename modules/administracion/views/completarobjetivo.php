<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\administracion\models\EncuestaObjetivo;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuesta-form">

    <?php $form = ActiveForm::begin(); ?>
	<H2>Nivel de Cumplimiento de Objetivos Propuestos en la Evaluacion Anterior</H2>


    <H2>Objetivos de trabajo para el proximo periodo de Evaluacion</H2>
    <?= $form->field($model, 'texto')->textArea() ?>
   
    
    <H2>Recomendacion Final</H2>
    
    <?php ActiveForm::end(); ?>

    <p>
         <?= Html::a('Volver', Yii::$app->request->referrer, ['class'=>'btn btn-primary']) ?>
         <?= Html::a('Siguiente', ['encuestas/completargracias'], ['class'=>'btn btn-primary']) ?>
    </p>  

</div>
