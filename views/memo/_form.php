<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\file\FileInput;

use app\models\Empresas;
use app\models\Gerencias;
use app\models\Sectores;
use app\models\Areas;

use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;

use app\models\Pdfmemosupload;



/* @var $this yii\web\View */
/* @var $model app\models\Memo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memo-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <?= $form->field($model, 'titulo')->textInput() ?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textInput() ?>

    <?= $model->isNewRecord ? $form->field($model, 'gerencia')->dropDownList(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre'),
    [
        'onchange'=>'
                        $.get( "'.Url::toRoute('usuario/sectores').'", { id: $(this).val() } )
                            .done(function( data ) {
                                var myArray=JSON.parse(data);
                                    $( "#memo-sector" ).html("");
                                    $.each( myArray, function( i, l ){
                                        $( "#memo-sector" ).append($("<option>", {
                                            value: i,
                                            text: l
                                        }));
                                    });
                            }
                        );
                    ',
        'prompt'=>'Seleccione una gerencia'
    ]
    ):''; 
    ?>

    <?= $model->isNewRecord ? $form->field($model, 'sector')->dropDownList(array(),
        [  
           'onchange'=>'            
                            $.get( "'.Url::toRoute('usuario/areas').'", { id: $(this).val() } )
                                .done(function( data ) {
                                    var myArray=JSON.parse(data);
                                        $( "#memo-area" ).html("");
                                        $.each( myArray, function( i, l ){
                                            $( "#memo-area" ).append($("<option>", {
                                                value: i,
                                                text: l
                                            }));
                                        });
                                }
                            );
                        ',
            'prompt'=>'Elija un Sector'

        ]
        ):''; 
    ?>

    <?= $model->isNewRecord ? $form->field($model, 'area')->dropDownList(array(), 
            [
                'prompt'=>'Elija un Area'
            ]):''; 
    ?>

    <?= $form->field($model, 'manual')->checkbox(
        [  
           'onclick'=>'
                if ($("#memo-manual").prop("checked"))
                {
                    $("#oculto").css("display","block");
                }
                else
                {
                    $("#oculto").css("display","none");
                }
           '
        ]
        );

    ?>

    <div id='oculto' style='display:none;'>      
    <?=
    // Display an initial preview of files with caption 
    // (useful in UPDATE scenarios). Set overwrite `initialPreview`
    // to `false` to append uploaded images to the initial preview.
        $model->isNewRecord ?
                $form->field($imageModel, 'image')->widget(FileInput::classname(), [
                    'options'=>[
                        'multiple'=>false
                    ],
                    'pluginOptions' => [
                        'overwriteInitial'=>false
                    ]
                ])
        :
                $form->field($imageModel, 'image')->widget(FileInput::classname(), [
                    'options'=>[
                        'multiple'=>false
                    ],
                    'pluginOptions' => [
                    'allowedPreviewTypes' => ['object'],
                        'initialPreview'=>[
                        '<object data="memos/' . $model->id . '.pdf" type="application/pdf" width="350%" height="200px"> ',
                        ],
                    'initialCaption'=>"Memos",
                    'overwriteInitial'=>true
                    ]
                ])
    ?>
    </div>


    <?php // ************* Los campos fecha en la base de datos tienen que ser DATE **********************?>    

    <?= $form->field($model, 'fechacreacion')->widget(DateControl::classname(), [

        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'dd/MM/yyyy',
        'language'=>'es',
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]);?>

    <?= $form->field($model, 'fechamodificacion')->widget(DateControl::classname(), [

        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'dd/MM/yyyy',
        'language'=>'es',
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]);?>

    <?= $form->field($model, 'fechainicio')->widget(DateControl::classname(), [


        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'dd/MM/yyyy',
        'saveFormat' => 'yyyymmdd',
        'language'=>'es',
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]);?>

    <?= $form->field($model, 'fechafin')->widget(DateControl::classname(), [

        'type'=>DateControl::FORMAT_DATE,
        'displayFormat' => 'dd/MM/yyyy',
        'language'=>'es',
        'options' => [
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]
    ]);?>

    <?= $model->isNewRecord ? $form->field($model, 'creador')->textInput():'' ;?>

    <?= $form->field($model, 'vigente')->checkbox()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$onClickArt=$this->registerJs(" 

$(document).ready(function() {

    
    $.get( '".Url::toRoute('usuario/gerencias')."', { id: $(this).val() } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
            $( '#memo-gerencia' ).html('');
            $.each( myArray, function( igerencia, lnombre ){
                if (igerencia == $model->gerencia)
                {
                    $( '#memo-gerencia' ).append($('<option>', {                    
                        value: igerencia,
                        text: lnombre,
                        selected: 'selected'
                    }));
                }
                else
                {
                    $( '#memo-gerencia' ).append($('<option>', {
                        value: igerencia,
                        text: lnombre
                    }));                        
                }
            });

    });

    $.get( '".Url::toRoute('usuario/sectorestodos')."', { id: 1 } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
        $( '#memo-sector' ).html('');
        $.each( myArray, function( isector, lnombre ){
            if (isector == $model->sector)
            {
                $( '#memo-sector' ).append($('<option>', {                    
                    value: isector,
                    text: lnombre,
                    selected: 'selected'
                }));
            }else{
                $( '#memo-sector' ).append($('<option>', {
                    value: isector,
                    text: lnombre
                }));                        
            }
        });
    });

    $.get( '".Url::toRoute('usuario/areastodas')."', { id: 1 } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
            $( '#memo-area' ).html('');
            $.each( myArray, function( iarea, lnombre ){
                if (iarea == $model->area)
                {
                    $( '#memo-area' ).append($('<option>', {                    
                        value: iarea,
                        text: lnombre,
                        selected: 'selected'
                    }));
                }
                else
                {
                    $( '#memo-area' ).append($('<option>', {
                        value: iarea,
                        text: lnombre
                    }));                        
                }
            });
    });

}); 

");
?>
