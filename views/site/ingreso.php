<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Empresas;
use app\models\Gerencias;
use yii\helpers\Url;

$this->title = 'Ingreso de usuarios';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-lg-offset-1" style="color:#999;">
        <h3><p>Complete los campos para ingresar:</p></h3>
    </div>

          <?PHP if (Yii::$app->getSession()->getFlash('danger'))
            {?>
            <hr style="clear:both;">
            <div class="alert alert-danger">
            <?= Yii::$app->getSession()->getFlash('danger');?>
            </div>
          <?PHP } ?>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
        ]); ?>

        <?= $empresa = $form->field($model, 'empresa')->dropDownList(ArrayHelper::map(Empresas::find()->all(), 'codigo', 'nombre'), 
);
        ?>
        <?= $legajo = $form->field($model, 'legajo')->textInput(); ?>

        <?= $password = $form->field($model, 'password')->passwordInput(); ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                 <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
