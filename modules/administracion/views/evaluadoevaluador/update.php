<?php

use yii\helpers\Html;
use app\modules\administracion\models\Encuesta;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\EvaluadoEvaluador */

$this->title = 'Modificar evaluado - evaluador';
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="evaluado-evaluador-update">

	<?php 
		$encuesta = Encuesta::find()->where('id = ' . $model->encuesta)->One();
		$this->title = $this->title . ': ' . $encuesta['descripcion'];
	?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
