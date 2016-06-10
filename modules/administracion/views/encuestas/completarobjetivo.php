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

<?php if(Yii::$app->getSession()->hasFlash('error')) { ?>
    <div class="alert alert-danger">
        <?php echo Yii::$app->getSession()->getFlash('error'); ?>
    </div>
<?php } ?>

<div class='encuesta-form'>

    <?php $form = ActiveForm::begin(['action'=> ['encuestas/completarobjetivo']]); ?>
    <div class='panel panel-info'> 
        <div class='panel-heading'> 
            <H3 class='panel-title'>Nivel de Cumplimiento de Objetivos Propuestos en la Evaluacion Anterior</H3> 
        </div> 
        <div class='panel-body'> 
            <div class='row'>
                <div class='col-md-4'>
                    <label class='radio-inline'>
                        <input type='radio' name='rbnivel' id='rbalto' value='1' <?=($model[0]['nivel'] == 1) ? "checked=''" : ''?> > ALTO
                    </label>
                </div>
                <div class="col-md-4">
                    <label class='radio-inline active'>
                        <input type='radio' name='rbnivel' id='rbmedio' value='2' <?=($model[0]['nivel'] == 2) ? "checked=''" : ''?> > MEDIO
                    </label>
                </div>
                <div class="col-md-4">
                    <label class='radio-inline'>
                        <input type='radio' name='rbnivel' id='rbbajo' value='3' <?=($model[0]['nivel'] == 3) ? "checked=''" : ''?> > BAJO
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-info"> 
        <div class="panel-heading"> 
            <H3 class="panel-title">Objetivos de trabajo para el proximo periodo de Evaluacion</H3> 
        </div> 
        <div class="panel-body"> 
            <div class="row">
                <div class="col-md-12">
                    <textarea class='form-control' name='objetivo' id='objetivo' rows='4' maxlength="1000"><?=$model[0]['texto']?></textarea>
                </div>
            </div>
        </div>
    </div>
	
    <div class="panel panel-info"> 
        <div class="panel-heading"> 
            <H3 class="panel-title">Recomendacion Final</H3> 
        </div> 
        <div class="panel-body"> 
            <div class="row">
                <div class="col-md-4">
                    <label class='radio-inline active'>
                        <input type='radio' name='rbreco' id='rbcont' value='1' <?=($model[0]['recomendacion'] == 1) ? "checked=''" : ''?> > Continua en la funcion
                    </label>
                </div>
                <div class="col-md-4">
                    <label class='radio-inline'>
                        <input type='radio' name='rbreco' id='rbreca' value='2' <?=($model[0]['recomendacion'] == 2) ? "checked=''" : ''?> > Se solicita re categorizacion (Adjuntar solicitud especifica)
                    </label>
                </div>
            </div>
        </div>
    </div>    

    <div class="form-group">
        <?= Html::a('Volver', ['encuestas/completaraspectos'], ['class'=>'btn btn-primary']) ?>
        <?= Html::submitButton('Siguiente', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
