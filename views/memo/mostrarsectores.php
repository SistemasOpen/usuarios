<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



?>
<div class="mostrarsectores">

 
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $form = ActiveForm::begin(); ?>
    <?php  ?>
    <p>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
    </p>
    <input type="hidden" name="idMemo" value="<?= Yii::$app->request->get('id');?>">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
            'label'=>'Gerencia',
            'attribute'=>'Nombre',
            ],
            [
            'label'=>'Sector',
            'attribute'=>'NombreSector',
            ],
            [
            'class' => 'yii\grid\CheckboxColumn',
            'checkboxOptions'=>function ($model, $key, $index){
                return [
                    'value'=>$model['Sector'], //'onclick'=>"alert('yourJavascript is here')" 
                    'checked'=>($model['seleccion']<>0)?true:false,
                ];
            },
            ],
        ],
    ]); ?>

</div>

    <div class="form-group">
        <?= Html::submitButton('Modificar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php
/*$onClickArt=$this->registerJs(" 

$(document).ready(function() {
        var keys = $('#w0').yiiGridView('getSelectedRows');

        $.post({
           url: 'Grabarsectoresmemo',
           dataType: 'json',
           data: {keylist: keys},
           success: function(data) {
              alert('I did it! Processed checked rows.')
           },
        });        
}); 

");*/
?>



<?php
/*
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\data\ArrayDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider 




<div class="mostrarsectores">

 
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $form = ActiveForm::begin(); ?>
    <?php  ?>
    <p>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
    </p>
<input type="hidden" name="idMemo" value="<?= Yii::$app->request->get('id');?>">

<?PHP 

    foreach ($arrGerencia AS $gerencia)
    {
        $dataProvider = new ArrayDataProvider([
                'allModels' => $gerencia['Sectores'],
                'pagination' => [
                    'pageSize' => 20,
                ],

        ]);
        echo $gerencia['Nombre'];
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            [
            'label'=>'Sector',
            'attribute'=>'Nombre',
            ],
            [
            'class' => 'yii\grid\CheckboxColumn',
            'checkboxOptions'=>function ($model, $key, $index,$gerencia){
                //print_r($model);exit;
                return [
                    'value'=>$model['Nombre'], //'onclick'=>"alert('yourJavascript is here')" 
                    'name'=>'dfdfd',
                    'checked'=>($model['selection']<>0)?true:false,
                ];
            },
            ],
        ],
    ]); 
    }

?>


</div>

    <div class="form-group">
        <?= Html::submitButton('Modificar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php
/*$onClickArt=$this->registerJs(" 

$(document).ready(function() {
        var keys = $('#w0').yiiGridView('getSelectedRows');

        $.post({
           url: 'Grabarsectoresmemo',
           dataType: 'json',
           data: {keylist: keys},
           success: function(data) {
              alert('I did it! Processed checked rows.')
           },
        });        
}); 

");*/

?>