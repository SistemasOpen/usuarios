<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empresas;
use app\models\Gerencias;
use app\models\Sectores;
use app\models\Areas;
use app\models\Pdfplantillaupload;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\file\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Plantillas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plantillas-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        
    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'tipoarchivo')->dropDownList(['PDF'=>'pdf', 'Word'=>'word', 'Excel'=>'excel']);?>

    <?= $form->field($model, 'gerencia')->dropDownList(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre'),
    [
        'onchange'=>'
                        $.get( "'.Url::toRoute('plantillas/sectores').'", { id: $(this).val() } )
                            .done(function( data ) {
                                var myArray=JSON.parse(data);
                                    $( "#plantillas-sector" ).html("");
                                    $.each( myArray, function( i, l ){
                                        $( "#plantillas-sector" ).append($("<option>", {
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
    <?= $form->field($model, 'sector')->dropDownList(array(),
        [  
           'onchange'=>'            
                            $.get( "'.Url::toRoute('plantillas/areas').'", { id: $(this).val() } )
                                .done(function( data ) {
                                    var myArray=JSON.parse(data);
                                        $( "#plantillas-area" ).html("");
                                        $.each( myArray, function( i, l ){
                                            $( "#plantillas-area" ).append($("<option>", {
                                                value: i,
                                                text: l
                                            }));
                                        });
                                }
                            );
                        ',
            'prompt'=>'Elija un Sector'

        ]
        ); 
    ?>

    <?php //= $form->field($model, 'area')->dropDownList(array(), ?>
    <?= $form->field($model, 'area')->dropDownList(array(), 
            [
                'prompt'=>'Elija un Area'
            ]) 
    ?>
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
                    '<object data="plantillas/p' . $model->id . '.pdf" type="application/pdf" width="350%" height="200px"> ',
                    ],
                'initialCaption'=>"Plantillas",
                'overwriteInitial'=>true
                ]
            ])


    ?>


    <?php /*= $form->field($imageModel, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
         'pluginOptions'=>[
                'class'=> 'file-preview-image',
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => true,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="glyphicon glyphicon-folder-open"></i> ',
                'browseLabel' =>  'Elegir imagenes',
                'initialPreview'=>[Html::img('uploads/'.$model->legajo.'_'.$model->empresa.'.jpg',  ['class'=>'file-preview-image',])],
                'overwriteInitial'=>true,
                'uploadUrl' => Url::to(['/Files/uploads/', 'image' => $imageModel->image]),
                'allowedFileExtensions'=>['jpg'],
                ],

    ]);*/?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$onClickArt=$this->registerJs(" 

$(document).ready(function() {    

    $.get( '".Url::toRoute('plantillas/gerencias')."', { id: $(this).val() } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
            $( '#plantillas-gerencia' ).html('');
            $.each( myArray, function( igerencia, lnombre ){
                if (igerencia == " . json_encode($model->gerencia) . ")
                {
                    $( '#plantillas-gerencia' ).append($('<option>', {                    
                        value: igerencia,
                        text: lnombre,
                        selected: 'selected'
                    }));
                }
                else
                {
                    $( '#plantillas-gerencia' ).append($('<option>', {
                        value: igerencia,
                        text: lnombre
                    }));                        
                }
            });

    });

    $.get( '".Url::toRoute('plantillas/sectorestodos')."', { id: 1 } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
        $( '#plantillas-sector' ).html('');
        $.each( myArray, function( isector, lnombre ){
            if (isector == " . json_encode($model->sector) . ")
            {
                $( '#plantillas-sector' ).append($('<option>', {                    
                    value: isector,
                    text: lnombre,
                    selected: 'selected'
                }));
            }else{
                $( '#plantillas-sector' ).append($('<option>', {
                    value: isector,
                    text: lnombre
                }));                        
            }
        });
    });

    $.get( '".Url::toRoute('plantillas/areastodas')."', { id: 1 } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
            $( '#plantillas-area' ).html('');
            $.each( myArray, function( iarea, lnombre ){
                if (iarea == " . json_encode($model->area) . ")
                {
                    $( '#plantillas-area' ).append($('<option>', {                    
                        value: iarea,
                        text: lnombre,
                        selected: 'selected'
                    }));
                }
                else
                {
                    $( '#plantillas-area' ).append($('<option>', {
                        value: iarea,
                        text: lnombre
                    }));                        
                }
            });
    });
    
}); 

");
?>
