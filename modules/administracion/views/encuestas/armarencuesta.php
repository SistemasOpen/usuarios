<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\administracion\models\Competenciadescripcion;


/* @var $this yii\web\View */
/* @var $model app\models\EcHeadEstados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?PHP if (Yii::$app->getSession()->getFlash('danger'))
          {?>
             <hr style="clear:both;">
             <div class="alert alert-danger">
               <?=Yii::$app->getSession()->getFlash('danger');?>
             </div>
    <?PHP } ?>

    <?= $form->field($model, 'idCompetencia')->dropDownList(ArrayHelper::map(Competenciadescripcion::find()->all(), 'id', 'Texto'))?> 

    <div class="form-group">
        <?= Html::submitButton('Agregar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <div class="form-group">
        <h3>Competencias</h3>
    </div>

   <?= GridView::widget([
        'dataProvider' => $dataProvider,
       //'filterModel' => $searchModel,
        'columns' => [
            'IdEncuesta0.descripcion',
            'Tipocompetencia0.descripcion',
/*            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{borrar}',
            'buttons' => [
                'borrar' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                ['borrar', 'idEstado' => $model->idEstado, 'NORDEN' => $model->NORDEN], 
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
*/
        ],

    ]); ?>

   <?= Html::a('Volver', ['/site/index'], ['class' => 'btn btn-info']) ?>


</div>

