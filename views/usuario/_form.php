<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empresas;
use app\models\Gerencias;
use app\models\Sectores;
use app\models\Areas;
use app\models\Categorias;
use app\models\Puestos;
use app\models\Depositos;
use app\models\Usuario;


use app\models\Imageupload;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\file\FileInput;

use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $model->isNewRecord ? $form->field($model, 'empresa')->dropDownList(ArrayHelper::map(Empresas::find()->all(), 'codigo', 'nombre'), 
            [           
                'onchange'=>'if ($(this).val()!= "")
                {
                $.get( "'.Url::toRoute('usuario/gerencias').'", { id: $(this).val() } )
                                .done(function( data ) {
                                    var myArray=JSON.parse(data);
                                    $( "#usuario-gerencia" ).html("");
                                    $.each( myArray, function( i, l ){
                                        $( "#usuario-gerencia" ).append($("<option>", {
                                            value: i,
                                            text: l
                                        }));
                                    });
                                 $("#usuario-legajo").prop("readonly", false);
                                 $("#usuario-gerencia").prop("disabled", false); 
                                 $("#usuario-sector").prop("disabled", false); 
                                 $("#usuario-area").prop("disabled", false);    
                            });
                 }else{
                     $("#usuario-legajo").prop("readonly", true);
                     $("#usuario-gerencia").prop("disabled", true); 
                     $("#usuario-gerencia").val("");
                     $("#usuario-sector").prop("disabled", true); 
                     $("#usuario-sector").val("");
                     $("#usuario-area").prop("disabled", true);
                     $("#usuario-area").val("");
                 } '
                , 'prompt'=>'Seleccione una empresa'
            ]):'';
    ?>

    <?= $model->isNewRecord ?$form->field($model, 'legajo')->textInput(['readonly' =>true]):'';?>

    <input type="hidden" name="Legajo" value="<?= $model->legajo;?>">
    <input type="hidden" name="Empresa" value="<?= $model->empresa;?>">


    <?php //=  $model->isNewRecord ?$form->field($model, 'gerencia')->dropDownList(array(),?>
    <?= $form->field($model, 'gerencia')->dropDownList(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre'),
    [
        'onchange'=>'
                        $.get( "'.Url::toRoute('usuario/departamentos').'", { id: $(this).val() } )
                            .done(function( data ) {
                                var myArray=JSON.parse(data);
                                    $( "#usuario-departamento" ).html("");
                                    $.each( myArray, function( i, l ){
                                        $( "#usuario-departamento" ).append($("<option>", {
                                            value: i,
                                            text: l
                                        }));
                                    });
                            }
                        );
                    ',
        'prompt'=>'Seleccione una gerencia'
    ]
    ); 
    ?>

    <?php //= $form->field($model, 'sector')->dropDownList(array(),?>
    <?= $form->field($model, 'departamento')->dropDownList(array(),
        [  
           'onchange'=>'            
                            $.get( "'.Url::toRoute('usuario/areas').'", { id: $(this).val() } )
                                .done(function( data ) {
                                    var myArray=JSON.parse(data);
                                        $( "#usuario-area" ).html("");
                                        $.each( myArray, function( i, l ){
                                            $( "#usuario-area" ).append($("<option>", {
                                                value: i,
                                                text: l
                                            }));
                                        });
                                }
                            );
                        ',
            'prompt'=>'Elija un Departamento'

        ]
        ); 
    ?>

    <?php //= $form->field($model, 'area')->dropDownList(array(), ?>
    <?= $form->field($model, 'area')->dropDownList(array(), 
            [
                'prompt'=>'Elija un Area'
            ]) 
    ?>

    <div class="compactRadioGroup">
        <?php
            $list = [0 => 'Masculino', 1 => 'Femenino'];
            echo $form->field($model, 'sexo')->radioList($list); 
        ?>
    </div>
    <?= $form->field($model, 'categoria')->dropDownList(ArrayHelper::map(Categorias::find()->all(), 'Id', 'Descripcion')) ?>

    <?= $form->field($model, 'puesto')->dropDownList(ArrayHelper::map(Puestos::find()->all(), 'id', 'descripcion')) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'ultimoacceso')->textInput() ?>

    <?= $form->field($model, 'fechamodificacion')->textInput() ?>

    <?= $form->field($model, 'admin')->checkbox()?>

    <?= $form->field($model, 'cambiapass')->checkbox()?>

    <?= $form->field($model, 'documento')->textInput() ?>

     <?= $form->field($model, 'fechanacimiento')->widget(DateControl::classname(), [

        'type'=>DateControl::FORMAT_DATE,
    'displayFormat' => 'php:D, d-M-Y',
    'language'=>'es',
    'options' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
]);

    ?>

    <div id='sucursaloculto' style='display:none;'>      
        <?= $form->field($model, 'sucursal')->dropDownList(array_merge([0=>'Ninguno',], ArrayHelper::map(Depositos::find()->All(), 'codigo', 'nombre'))) ?>
    </div>

    <?= $form->field($model, 'activo')->checkbox()?>

    <?php
                 $files = glob('uploads/' . $model->legajo . '_' . $model->empresa . '.*'); 
                if (empty($files))
                {
                    $archivo = 'uploads/noimagen.png';
                }
                else
                {
                    $archivo = $files[0];
                }
    ?>    

    <input type="checkbox" id="foto" name="foto" value="1"> Foto<br>

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
                         Html::img($archivo , ['class'=>'file-preview-image', 'alt'=>'Foto', 'title'=>'Usuarios']),                        
                        ],
                    'initialCaption'=>"Usuarios",
                    'overwriteInitial'=>true
                    ]
                ])
    ?>
    </div>


     <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$onClickArt=$this->registerJs(" 

$(document).ready(function() {

    
    $.get( '".Url::toRoute('usuario/gerencias')."', { id: $(this).val() } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
            $( '#usuario-gerencia' ).html('');
            $.each( myArray, function( igerencia, lnombre ){
                if (igerencia == $model->gerencia) 
                {
                    $( '#usuario-gerencia' ).append($('<option>', {                    
                        value: igerencia,
                        text: lnombre,
                        selected: 'selected'
                    }));
                }
                else
                {
                    $( '#usuario-gerencia' ).append($('<option>', {
                        value: igerencia,
                        text: lnombre
                    }));                        
                }
            });

    });

    $.get( '".Url::toRoute('usuario/departamentostodos')."', { id: 1 } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
        $( '#usuario-departamento' ).html('');
        $.each( myArray, function( isector, lnombre ){
            if (isector == $model->departamento)
            {
                $( '#usuario-departamento' ).append($('<option>', {                    
                    value: isector,
                    text: lnombre,
                    selected: 'selected'
                }));
            }else{
                $( '#usuario-departamento' ).append($('<option>', {
                    value: isector,
                    text: lnombre
                }));                        
            }
        });
    });

    $.get( '".Url::toRoute('usuario/areastodas')."', { id: 1 } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
            $( '#usuario-area' ).html('');
            $.each( myArray, function( iarea, lnombre ){
                if (iarea == $model->area)
                {
                    $( '#usuario-area' ).append($('<option>', {                    
                        value: iarea,
                        text: lnombre,
                        selected: 'selected'
                    }));
                }
                else
                {
                    $( '#usuario-area' ).append($('<option>', {
                        value: iarea,
                        text: lnombre
                    }));                        
                }
            });
    });

     $('#foto').change(function()
    {
        if ($('#foto').prop('checked'))
        {
            $('#oculto').css('display','block');
        }
        else
        {
            $('#oculto').css('display','none');
        }
 
    });

     $('#usuario-gerencia').change(function()
    {
        if ($('#usuario-gerencia').val() == 7)
        {
            $('#sucursaloculto').css('display','block');
            $('#usuario-sucursal option[value=\"0\"]').attr('disabled','disabled');
        }
        else
        {
            $('#usuario-sucursal option[value=\"0\"]').attr('disabled',false);
            $('#sucursaloculto').css('display','none');
            $('#usuario-sucursal').val(0);
        }
 
    });

        if ($('#usuario-gerencia').val() == 7)
        {
            $('#sucursaloculto').css('display','block');
            $('#usuario-sucursal option[value=\"0\"]').attr('disabled','disabled');
        }
        else
        {
            $('#usuario-sucursal option[value=\"0\"]').attr('disabled',false);
            $('#sucursaloculto').css('display','none');
            $('#usuario-sucursal').val(0);
        }


}); 

");
?>
