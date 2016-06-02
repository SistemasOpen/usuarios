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

<h2>Encuestas pendientes de Completar</h2>
<div class="encuesta-view">
    <?= 
        GridView::widget([
        'dataProvider' => $model,
        'filterModel' => null,
        'columns' => [
        'Descripcion',  
        'Evaluado',
        'Evaluador',
        ['class' => 'yii\grid\ActionColumn',
            'header'    => 'Completar',
            'template'  => '{completarencuesta}', 
            'buttons'   => [ 'completarencuesta' => function($url, $model) 
                                { return Html::a('<span class="glyphicon glyphicon-forward"></span>', 
                                                    ['completarencuesta', 'id' => $model['Encuesta'], 'fun'=>'1'], 
                                                    ['title' => Yii::t('yii', 'completarencuesta'), 
                                                     'data-pjax'=>'0' 
                                                    ]) ;
                                }
                            ]
        ] //Cierra class
        ] //Cierra columns
        ]); //Cierra widget
    ?>
    
</div>

