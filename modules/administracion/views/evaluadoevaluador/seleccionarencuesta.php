<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\grid\GridView;

use app\modules\administracion\models\Encuesta;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EvaluadoEvaluador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluado-evaluador-form">

    <?php $form = ActiveForm::begin(); ?>

    <p>
        <h2>Seleccionar una encuesta para calificar</h2>
	    <h3><?= Yii::$app->user->identity->nombre ?></h3>

	</p>

	<div class="container-fluid">

    <?= Html::dropDownList( 'id', 'encuesta',ArrayHelper::map($resultado, 'id', 'encuesta'), ['prompt'=>'Seleccionar la encuesta ...','class'=>'form-control']);?> 
	</div>




    <p>
        <div class="form-group">
            <?= Html::submitButton('Actualizar', ['class' =>'btn btn-success']) ?>
        </div>
    </p>    

    <?php ActiveForm::end(); ?>

</div>
