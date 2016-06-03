<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administracion\models\Depositosencargados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="depositosencargados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iddeposito')->dropDownList(ArrayHelper::map(Depositos::find()->all(), 'id', 'nombre'))?> 

    <?php $resultado = Yii::$app->get('dbmdq')->createCommand('select id, legajo, nombre, sucursal 
    		from usuarios u inner join categorias c on u.categorialegajo = c.id 
    		where c.orden > 4 and u.gerecia = 7 order by legajo')->queryAll();

        echo $form->field($model, 'idencargado')->dropDownList(ArrayHelper::map($resultado, 'id', 'nombre')); ?>

	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
