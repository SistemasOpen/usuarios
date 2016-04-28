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

use yii\grid\GridView;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>
<article>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?php $sucursal = 1; 
            $datos = ''; 
    ?>
    <?= $form->field($model, 'sucursal')->dropDownList(ArrayHelper::map(Depositos::find()->all(), 'id', 'nombre'),
                [
                    'onchange' => '
                    $.ajax({
                         
                          method:"GET",
                          url: "'.Url::toRoute('usuario/mostrarlegajosucursal').'",
                          data: { id: $(this).val() },
                            success: function( data ) {
                                data=JSON.parse(data);
                                $("article").html(data);
                            }
                    });

                        ',
            'prompt'=>'Elija una sucursal'
                ]
    );?>


 <?=    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            [
            'label'=>'Legajo',
            'attribute'=>'legajo',
            //'style'=>['width:30px'],
            'contentOptions' => ['style'=>'width:100px'],
            ],
            [
            'label'=>'Apellido y nombre',
            'attribute'=>'nombre',
            ],
            [
            'label'=>'Empresa',
            'attribute'=>'empresa',
            ],
            [
            'label'=>'Sucursal',
            'attribute'=>'deposito',
            ],
           [
            'class' => 'yii\grid\CheckboxColumn',
            'checkboxOptions'=>function ($model, $key, $index){
                return [
                    'value'=>1, //'onclick'=>"alert('yourJavascript is here')" 
                    'checked'=>($model['marca']<>0)?true:false,
                ];
            },
            ],

        ],
    ]); ?>



        <?= Html::submitButton('Actualizar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Volver', ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</article>