<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Session;

/* @var $this yii\web\View */
/* @var $model app\modules\Encuesta\models\Encuesta */
    
//$this->params['breadcrumbs'][] = ['label' => 'Encuesta', 'url' => ['index']];
?>

<?php if(Yii::$app->getSession()->hasFlash('error')) { ?>
    <div class="alert alert-danger">
        <?php echo Yii::$app->getSession()->getFlash('error'); ?>
    </div>
<?php } ?>



<div class="encuesta-view">

    <?= GridView::widget([
        'dataProvider' => $cabeza,
        'filterModel' => null,
        'columns' => [
        'Encuesta',
        'Desde',
        'Hasta',
        'Gerencia',
        'Sector',
        'Area',
        'Evaluado',
        'Evaluador' ], 
        ]);
    ?>

    <?php 
        $funcion = Yii::$app->session['encuesta']['descfun']; 
        $idfun   = Yii::$app->session['encuesta']['idfun'];
    ?>  

    <?php $funcion = Yii::$app->session['encuesta']['descfun']; ?>
    <?= "<H1>$funcion</H1>"; ?>

    <?php
	     
	    $columnas= [
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function ($model, $index, $widget) { 
                        return Html::hiddenInput('id', $model['id']);  },
            ],
            [
                'attribute' => 'Competencia',
                'value'     => 'Competencia',
            ],
                
            'Desarrollo',
        ];

        for ($i = $inicio; $i <= $rango; $i++) 
        {
            $unaMas = 
            [
                'attribute' => $i,
                'format' => 'raw',
                'value' => function ($model, $index, $widget) use ($i) { 
                        return Html::radio( $model['id'] , $model['Opcion'] == $i ? true : false, ['value' => $i ]);  }
            ];
            array_push($columnas,$unaMas);
        }
			
        //print_r($columnas);exit;

        echo GridView::widget([
        'dataProvider' => $detalle,
        'filterModel' => null,
        'columns' => $columnas, 
        'responsive'=>true,
        //'hover'=>true            
        ]);
    ?>

    <p>
         <?= Html::a('Volver', Yii::$app->request->referrer, ['class'=>'btn btn-primary']) ?>
         <?= Html::a('Siguiente', ['encuestas/mostrarfuncioncompleta','id'=>$id,'fun'=> $idfun], ['class'=>'btn btn-primary']) ?>
    </p>  


</div>

<?php
$script = <<< JS
$(document).ready(function(){

    $('tr').on('click' , function(){
        
        var id = $(this).find("input:first").val();
        var valor = $("input[type='radio'][name='" + id + "']:checked").val();

        if (id != undefined && valor != undefined )
        {
            $.ajax({
            url: 'index.php?r=administracion/encuestas/actualizardetalle',
            type: 'get',
            data: { id: id,  valor: valor },
            success: function (data) { console.log(data); }
            });
        }

        //alert('id= ' + id + ' - valor= ' + valor);
    });
}); 
JS;
$this->registerJs($script);

?>
