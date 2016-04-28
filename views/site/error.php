<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Ocurrio un error mientras se procesaba su solicitud.
    </p>
    <p>
        Por favor envie un e-mail a computos@opensports.com.ar indicando el inconveniente. Gracias.
    </p>

</div>
