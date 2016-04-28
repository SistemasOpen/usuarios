<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Categorias;




/* @var $this yii\web\View */
/* @var $searchModel app\modules\Admin\models\EvaluadoEvaluadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evaluado Evaluador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluado-evaluador-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Volver', ['memo/ultimasnovedades'], ['class' => 'btn btn-success']) ?>
        <?php 
            if(Yii::$app->user->identity->admin)
            {   
                echo Html::a('Agregar', ['create'], ['class' => 'btn btn-success']); 
            }
        ?>

    </p>
    <p>
          <h4>Dirección de la encuesta</h4>
          <input type="radio" name="direccion" value="arriba"> Hacia arriba<br>
          <input type="radio" name="direccion" value="abajo"> Hacia abajo<br>
          <p>
            <h4>Categoría inicial</h4>
            <?= Html::dropDownList(ArrayHelper::map(Categorias::find()->all(), 'Id', 'Descripcion')) ?>
          </p>
    </p>

</div>