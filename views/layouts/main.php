<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\nav\NavX;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Open Sports',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);


        if (!Yii::$app->user->isGuest)
        {
                $items[]=[
                    'label' =>'Ultimas novedades',
                    'url' => ['/memo/ultimasnovedades'],
                    'options' =>['class'=>'carting']];

                $items[]=[
                    'label' =>'Cumpleaños',
                    'url' => ['/usuario/listarcumple'],
                    'options' =>['class'=>'carting']];

                $items[]=[
                    'label' => 'Memos',
                    'url' => ['/memo/index'],
                    'options' =>['class'=>'carting']];

                $items[]=[
                    'label' => 'Plantillas',
                    'url' => ['/plantillas/index'],
                    'options' =>['class'=>'carting']];

                $items[]=[
                    'label' => 'Rotulos',
                    'url' => ['/depositos/rotulos'],
                    'options' =>['class'=>'carting']];


            if(Yii::$app->user->identity->admin)
            {   
                $items[]=[
                    'label' =>'Usuarios',
                    'active'=>true, 
                    'items'=>[

                        ['label'=>'Empresas',
                         'url' => ['/empresas/index'], 
                         'options' =>['class'=>'carting'],],
                            
                        ['label'=>'Gerencias',
                         'url' => ['/gerencias/index'], 
                         'options' =>['class'=>'carting'],],

                        ['label'=>'Departamentos',
                         'url' => ['/departamentos/index'], 
                         'options' =>['class'=>'carting'],],

                        ['label' =>'Areas',
                        'url' => ['/areas/index'],
                        'options' =>['class'=>'carting'],],

                        ['label' =>'Categorías',
                        'url' => ['/categorias/index'],
                        'options' =>['class'=>'carting'],],

                        ['label' =>'Puestos',
                        'url' => ['/puestos/index'],
                        'options' =>['class'=>'carting'],],

                        ['label'=>'ABM usuarios',
                         'url' => ['/usuario/index'], 
                         'options' =>['class'=>'carting'],],

                        ['label'=>'Asignar legajos a sucursal',
                         'url' => ['/usuario/mostrarlegajosucursal'], 
                         'options' =>['class'=>'carting'],],

                        ['label'=>'Encargados de locales',
                         'url' => ['/depositosencargados/index'], 
                         'options' =>['class'=>'carting'],],

                        ['label'=>'Cargar foto',
                         'url' => ['/usuario/cargarfoto'], 
                         'options' =>['class'=>'carting'],],

                        ['label'=>'Ver dependencias',
                         'url' => ['/usuario/verdependencia'], 
                         'options' =>['class'=>'carting'],],

                    ],
                 ];

                $items[]=[
                    'label' =>'Encuestas',
                    'active'=>true, 
                    'items'=>[

                        ['label'=>'Competencias',
                        'url' => ['/administracion/competenciadescripcion'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Tipos de competencias',
                        'url' => ['/administracion/tipocompetencia'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Desarrollo',
                        'url' => ['/administracion/desarrollo'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Rangos de encuesta',
                        'url' => ['/administracion/rango'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Valores de rangos',
                        'url' => ['/administracion/rangovalor'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Tipos de encuesta',
                        'url' => ['/administracion/tipoencuesta'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Consignas',
                        'url' => ['/administracion/consignas'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Evaluadores',
                        'url' => ['/administracion/evaluadoevaluador'], 
                        'options' =>['class'=>'carting'],],


                        ['label'=>'Encuestas',
                        'url' => ['/administracion/encuestas'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Encuestas publicadas',
                        'url' => ['/administracion/encuestas/encuestaspublicadas'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Encuestas finalizadas',
                        'url' => ['/administracion/encuestas/encuestasfinalizadas'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Tipo de movimiento para registro',
                        'url' => ['/administracion/tipomovimiento'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Registro de movimientos',
                        'url' => ['/administracion/registro'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Completar Encuesta',
                        'url' => ['/administracion/encuestas/encuestashabilitadas'], 
                        'options' =>['class'=>'carting'],],
                    ],
                ];

                $items[]=[
                    'label' =>'Beneficios',
                    'active'=>true, 
                    'items'=>[
                        ['label'=>'Cargar beneficios',
                        'url' => ['site/cargarbeneficios'], 
                        'options' =>['class'=>'carting'],],

                        ['label'=>'Visualizar',
                        'url' => 'plantillas/beneficios.pdf', 
                        'options' =>['class'=>'carting','target'=>'_blank'],
                        'linkOptions' => ['target' => '_blank']
                        ],

                    ],
                ];

            }
            else
            {

                $items[]=[
                    'label' =>'Beneficios',
                    'active'=>true, 
                    'items'=>[

                        ['label'=>'Visualizar',
                        'url' => 'plantillas/beneficios.pdf', 
                        'options' =>['class'=>'carting','target'=>'_blank'],
                        'linkOptions' => ['target' => '_blank']
                        ],

                    ],
                ];
            }

                $items[]=[
                    'label' => 'Sucursales',
                    'url' => ['/depositos/index'],
                    'options' =>['class'=>'carting']];

                $items[]=[
                    'label' => 'Logout (' . Yii::$app->user->identity->nombre . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];

}else{
            $items[]= ['label' => 'Iniciar sesión', 'url' => ['/site/login']];
        }

echo NavX::widget([
    'options'=>['class'=>'nav nav-pills'],
    'items' => $items,
    'activateParents' => true,
    'encodeLabels' => false,   
    'options' => ['class' =>'navbar-nav'],
]);

/*
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);
  */  

    NavBar::end();
    ?>
  
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Open Sports <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
