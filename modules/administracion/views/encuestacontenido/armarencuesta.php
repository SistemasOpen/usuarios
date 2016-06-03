<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\administracion\models\Competenciadescripcion;
use app\modules\administracion\models\Encuesta;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Encuesta */

/*
$this->title = 'Encuesta: ' . $modelenc->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
*/
$this->title = 'Encuestas no publicadas: ' . $modelenc->descripcion;

/* @var $this yii\web\View */
/* @var $model app\models\EcHeadEstados */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="encuesta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <?php
            if(Yii::$app->user->identity->admin)
            {   
                echo Html::a('Modificar', ['/administracion/encuestas/update', 'id' => $modelenc->id], ['class' => 'btn btn-primary']);
                echo Html::a('    ');

                echo Html::a('Publicar encuesta', ['encuestas/publicarencuesta', 'id' => $modelenc->id], ['class'=>'btn btn-success']);
                echo Html::a('    ');
                Modal::begin([
                        'header' => '<h2>¿Quieres duplicar la encuesta actual?</h2>',
                        'toggleButton' => ['label' => 'Duplicar Encuesta','class' => 'btn btn-warning'],
                ]);
    
                    echo Html::a('Confirmar', ['encuestacontenido/duplicarencuesta', 'id'=>$modelenc->id], ['class' => 'btn btn-success']) ;

                Modal::end();
                /*
                echo Html::a('Eliminar', ['delete', 'id' => $modelenc->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Está seguro de eliminar este item?',
                        'method' => 'post',
                    ],

                ]);*/
            }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $modelenc,
        'attributes' => [
            'descripcion',
            [
                'label'=>'Tipo de encuesta',
                'attribute'=>'idTipoEncuesta0.descripcion',
            ],
            /*
            [ 
              'label' => 'Activa desde fecha',
              'value' => date("d-M-Y",  strtotime($modelenc->fDesde)),
            ],
            [ 
              'label' => 'Activa hasta fecha',
              'value' => date("d-M-Y",  strtotime($modelenc->fHasta)),
            ],
            [
            'label'=>'Visible',            
            'format'=>'HTML',
            'value'=>($modelenc->visible==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            */
        ],
    ]) ?>

</div>

<div class="competencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?PHP if (Yii::$app->getSession()->getFlash('danger'))
          {?>
             <hr style="clear:both;">
             <div class="alert alert-danger">
               <?=Yii::$app->getSession()->getFlash('danger');?>
             </div>
    <?PHP } ?>

    <?PHP if (Yii::$app->getSession()->getFlash('duplicada'))
          {?>
             <hr style="clear:both;">
             <div class="alert alert-success">
               <?=Yii::$app->getSession()->getFlash('duplicada');?>
             </div>
    <?PHP } ?>


    <?php /*= $form->field($model, 'idEncuesta')->dropDownList(ArrayHelper::map(Encuesta::find()->all(), 'id', 'descripcion'),
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
                            });
                 }'
                , 'prompt'=>'Seleccione una encuesta'
            ]      
           )
    */?> 
    <div class="form-group">
        <h1>Competencias</h1>
    </div>
    <input type="hidden" name="idEncuesta" value="<?= $id;?>">
<?PHP
    $arrCompetencias=ArrayHelper::map(Competenciadescripcion::find()->all(), 'id', 'texto');
    foreach($arrCompetencias AS &$competencia){
        $competencia=utf8_encode($competencia);
    }
?>
    <?= $form->field($model, 'idCompetencia')->dropDownList($arrCompetencias)->label('Asignar una nueva competencia')?> 

    <div class="form-group">
        <?= Html::submitButton('Agregar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

        <h3>Competencias Asignadas</h3>
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
       //'filterModel' => $searchModel,
        'columns' => [
            'idEncuesta0.descripcion',
            [ 'label'=>'Competencia',
              'attribute'=>'competencia0.texto',
            ],
            
            'tipocompetencia0.descripcion',
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{borrar}',
            'buttons' => [
                'borrar' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                ['borrar', 'idEncuesta' => $model->idEncuesta, 'idCompetencia' => $model->idCompetencia], 
                                [
                                    'title' => 'Eliminar',
                                    'data-pjax' => '0',
                                ]
                            );
                },                          
             ],
            'headerOptions' => ['style'=>'width:100px; text-align:center'],
            'contentOptions' => ['style'=>'width:100px; text-align:center'],
            ],

        ],

    ]);




     ?>


    <p>
       <?= Html::a('Volver', ['encuestas/index'], ['class' => 'btn btn-info']) ?>
    </p>        

</div>

