<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if(Yii::$app->getSession()->hasFlash('error')) { ?>
    <div class="alert alert-danger">
        <?php echo Yii::$app->getSession()->getFlash('error'); ?>
    </div>
<?php } ?>

<div class="encuesta-form">

    <?php
        $form = ActiveForm::begin(['action'=> ['encuestas/completaraspectos']]); 
        $i = 0;
        foreach ($model as $aspecto => $valor) 
        {
            $i++;
    ?>
    
    <div class='panel panel-info'> 
        <div class='panel-heading'> 
            <H3 class='panel-title'><?= utf8_encode($valor['idtipoaspecto0']['descripcion']) ?></H3> 
        </div> 
        <div class='panel-body'> 
            <div class='row'>
                <div class='col-md-12'>
                    <input type='hidden' id='id1<?=$i?>' name='id[]' value='<?=$valor['id']?>'/>
                    <input type='hidden' id='id2<?=$i?>' name='tipo[]' value='<?=$valor['idtipoaspecto']?>'/>
                    <textarea class='form-control' id='tex<?=$i?>' name='text[]' rows='4' maxlength="1000"><?=$valor['texto']?></textarea>
                </div>
            </div>
        </div>
    </div>
    <?php  } ?>
    
    <div class="form-group">
        <?= Html::a('Volver', Yii::$app->request->referrer, ['class'=>'btn btn-primary']) ?>
        <?= Html::submitButton('Siguiente', ['class' => 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
