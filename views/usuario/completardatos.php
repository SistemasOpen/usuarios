<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empresas;
use app\models\Gerencias;
use app\models\Sectores;
use app\models\Departamentos;
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


$this->title = 'Modifcar Usuario: (' . $model->legajo . ') ' . $model->nombre;

?>

   <h1><?= Html::encode($this->title) ?></h1>


<div class="usuario-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <input type="hidden" name="Legajo" value="<?= $model->legajo;?>">
    <input type="hidden" name="Empresa" value="<?= $model->empresa;?>">

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


    <?php //=  $model->isNewRecord ?$form->field($model, 'gerencia')->dropDownList(array(),?>
    <div class="compactRadioGroup">
        <?php
            $list = [0 => 'Masculino', 1 => 'Femenino'];
            echo $form->field($model, 'sexo')->radioList($list); 
        ?>
    </div>

    <?= $form->field($model, 'categoria')->dropDownList(ArrayHelper::map(Categorias::find()->all(), 'Id', 'Descripcion')) ?>

    <?= $form->field($model, 'puesto')->dropDownList(ArrayHelper::map(Puestos::find()->all(), 'id', 'descripcion')) ?>

    <?php //= $form->field($model, 'dependede')->dropDownList(ArrayHelper::map(Usuario::find()->where('gerencia <> 7 and empresa = 1 and activo = 1')->orderby('nombre')->all(), 'id', 'nombre')); ?>

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



}); 

");
?>