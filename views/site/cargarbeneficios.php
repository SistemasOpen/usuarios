<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\file\FileInput;

use app\models\Pdfcargarbeneficios;



/* @var $this yii\web\View */
/* @var $model app\models\Memo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beneficios-form">

<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <p>
        <?php // = Html::a('Imprimir', ['importarusu'], ['class' => 'btn btn-success']) ?>
    </p>

<p>
	<h2> Actulizacion de beneficios vigentes </h2>
	<p>
<?=
               $form->field($imageModel, 'image')->widget(FileInput::classname(), [
                    'options'=>[
                        'multiple'=>false
                    ],
                    'pluginOptions' => [
                        'overwriteInitial'=>false
                    ]
                ])
?>
	</p>
    <div class="form-group">
        <?= Html::submitButton('Cargar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</p>
</div>
