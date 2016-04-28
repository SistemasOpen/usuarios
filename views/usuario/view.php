<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = '(' . $model->legajo . ') ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

     <p>
        <?php
            if(Yii::$app->user->identity->admin)
            {   
                echo Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                echo Html::a('    ');
                echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Está seguro de eliminar este item?',
                        'method' => 'post',
                    ],
                ]);
            }
        ?>
            
    </p>

    <?php $files = glob('uploads/' . $model->legajo . '_' . $model->empresa . '.*'); 
            if (empty($files))
            {
                $files[0] = 'uploads/noimagen.png';
            }
    ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'label'=>'Legajo',
            'attribute'=>'legajo',
            ],
            [
            'label'=>'Empresa',
            'attribute'=>'empresa0.nombre',
            ],
            [
            'label'=>'Gerencia',            
            'attribute'=>'gerencia0.nombre',
            ],
            [
            'label'=>'Departamento',            
            'attribute'=>'departamento0.nombre',
            ],
            [
            'label'=>'Area',            
            'attribute'=>'area0.nombre',
            ],
            [
            'label'=>utf8_decode('Categoría'),            
            'attribute'=>'categoria0.Descripcion',
            ],
            [
            'label'=>'Puesto',            
            'attribute'=>'puesto0.descripcion',
            ],
            [
            'label'=>'Password',
            'format'=>'HTML',
            'value'=>'********',
//            'password',
            ],
            [
            'label'=>'Es administrador',
            'format'=>'HTML',
            'value'=>($model->admin==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            //'cambiapass',
            
            [
            'label'=>'Nuevo Pasword',
            'format'=>'HTML',
            'value'=>($model->cambiapass==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            [
            'label'=>'Ultimo acceso',
            'attribute'=>'ultimoacceso',
            ],
            [
            'label'=>'Nro de documento',
            'attribute'=>'documento',
            ],
            [
            'label'=>'Fecha de nacimiento',
            'attribute'=>'fechanacimiento',
            ],
            [
            'label'=>'Activo',
            'format'=>'HTML',
            'value'=>($model->activo==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            [
            'label'=>'Fecha de modificación',
            'attribute'=>'fechamodificacion',
            ],
            [
            'label'=>'Fecha de alta',
            'attribute'=>'fechaalta',
            ],   

            [
            'label'=>'Sucursal',
            'attribute'=>'deposito0.nombre',
            ],   

            [
            'label'=>'Jefe',
            'attribute'=>'usuario0.nombre',
            ],   

            [
            'attribute'=>'Foto',
            'value'=> $files[0],
            'format' => ['image',['width'=>'100','height'=>'100']],                
            ],
        ],
    ]) 

//        echo Html::a('Ver foto', 'uploads' . $model->legajo . '_' . $model->empresa . '.png', ['class' => 'btn btn-info', 'target'=>'_blank']);
    ?>



</div>
