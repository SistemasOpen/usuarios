<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Empresas;


/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



?>
<div class="Rotulos">

 
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin( ['options'=>['target'=>'_blank']]); ?>

    <p>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
    </p>

        <?= $form->field($modelo, 'empresa')->dropDownList(ArrayHelper::map(Empresas::find()->all(), 'codigo', 'nombre'), 
            
            [                   
                'id'=>'empresa_o',
                'name' => 'empresa_o',
                'onchange'=>'if ($(this).val()!= "")
                {
                    $.get( "'.Url::toRoute('depositos/depositosporempresas').'", { id: $(this).val() }) 
                        .done(function( data ) {
                            var myArray=JSON.parse(data);
                            $( "#deposito_o" ).html("");
                            $.each( myArray, function( i, l ){
                                $( "#deposito_o" ).append($("<option>", {
                                    value: i,
                                    text: l
                                }));
                            });
                    });
                 }'
                , 'prompt'=>'Seleccione una empresa'
            ])->label('Empresa de orígen');
            
     ?>

    <?= $form->field($modelo, 'id')->dropDownList(array(),
            [
                'id'=>'deposito_o',
                'name' => 'deposito_o',
                'prompt'=>'Elija un depósito'
            ])->label('Depósito de orígen'); 
    ?>


    <?= $form->field($model, 'empresa')->dropDownList(ArrayHelper::map(Empresas::find()->all(), 'codigo', 'nombre'), 
            
            [                   
                'name' => 'empresa_d',
                'onchange'=>'if ($(this).val()!= "")
                {
                    $.get( "'.Url::toRoute('depositos/depositosporempresas').'", { id: $(this).val() }) 
                        .done(function( data ) {
                            var myArray=JSON.parse(data);
                            $( "#depositos-id" ).html("");
                            $.each( myArray, function( i, l ){
                                $( "#depositos-id" ).append($("<option>", {
                                    value: i,
                                    text: l
                                }));
                            });
                    });
    
                 }'
                , 'prompt'=>'Seleccione una empresa'
            ])->label('Empresa de destino');
            
    ?>

    <?= $form->field($model, 'id')->dropDownList(array(),
            [
                'name' => 'deposito_d',
                'prompt'=>'Elija un depósito'
            ])->label('Depósito de destino'); 
    ?>

</div>


    <div class="form-group">
        <?= Html::submitButton('Imprimir', ['class' => 'btn btn-info', 'data-toggle'=>'tooltip','target'=>'_blank']);?> 


        <?php /*= Html::submitButton('<i class="fa glyphicon glyphicon-print"></i> Imprimir', ['depositos/report'], 
            ['class' => 'btn btn-info',
             'target'=>'_blank', 
             'data-toggle'=>'tooltip', 
            ]); */?>

    </div>

    <?php ActiveForm::end(); ?>

