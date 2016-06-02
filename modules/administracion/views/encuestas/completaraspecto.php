<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\administracion\models\Encuestaaspecto;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuesta-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'texto')->textArea() ?>
   
    
    <?php ActiveForm::end(); ?>

    <p>
         <?= Html::a('Volver', Yii::$app->request->referrer, ['class'=>'btn btn-primary']) ?>
         <?= Html::a('Siguiente', ['encuestas/completarobjetivo','id'=>$id], ['class'=>'btn btn-primary']) ?>
    </p>  

</div>
