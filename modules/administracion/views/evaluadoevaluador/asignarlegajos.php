<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Usuario;
use app\models\Gerencias;
use app\models\Depositos;
use app\models\Departamentos;

use app\modules\administracion\models\Encuesta;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EvaluadoEvaluador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluado-evaluador-form">

    <?php $form = ActiveForm::begin(); ?>

    <p>
	    <h3><?= Yii::$app->user->identity->nombre ?></h3>

	    </p>

	<div class="container-fluid">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
            'label'=>'Legajo',
            'attribute'=>'legajo',
            ],
            [
            'label'=>'Apellido y nombre',
            'attribute'=>'nombre',
            ],
            [
            	'label'=>'Asignado a',
            	'attribute'=>'nomevaluador',
            ],

            [
            'class' => 'yii\grid\CheckboxColumn',
            'checkboxOptions'=>function ($model, $key, $index){
                return [
                    'value'=>$model['id'], //'onclick'=>"alert('yourJavascript is here')" 
                    'checked'=>($model['seleccion']<>0)?true:false,
                ];
            },
            ],
        ],
    ]); ?>

      <input type="hidden" name="encuesta" value="<?= $idEncuesta;?>">









    <?php // Html::dropDownList('id', 'descripcion', ArrayHelper::map(Encuesta::find()->all(), 'id', 'descripcion'), ['prompt'=>'Selecciona...','class'=>'form-control']);
	?> 
    <?php /* 
    	Html::dropDownList(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre')) ; */
	?> 

    <?php /*    	
    	Html::dropDownList(ArrayHelper::map(Depositos::find()->all(), 'codigo', 'nombre'));*/
	?> 

    <?php /*
    	Html::dropDownList(ArrayHelper::map(Departamentos::find()->all(), 'id', 'nombre')); */
	?> 

	</div>
		<ul class="list-group">
		<?php /*
			$encargados =ArrayHelper::map(Usuario::find()->where('gerencia = 7 and categorialegajo = 22')->all(), 'id', 'nombre');
		    $encargados->checkboxList(ArrayHelper::map($encargados::find()->all(), 'ID', 'NAME')); */
		?>					
		</ul>

    <div class="form-group">
        <?= Html::submitButton('Actualizar', ['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
