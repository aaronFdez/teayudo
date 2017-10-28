<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>



<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">
        .my-navbar {
            background-color: #fc6000;
            color: white;
        }
        p.navbar-text a {
            color: #fc6000;
            background-color: lightgrey;
        }
    </style>
</head>

<body>

<div class="site-index">

    <div class="container">
        <ul class="nav nav-pills nav-justified">
            <li><a href="#"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true">
            </span> Hogar</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-plane" aria-hidden="true">
            </span> Abogados</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-expand" aria-hidden="true">
            </span> Informática</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-flash" aria-hidden="true">
            </span> Cocina</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-knight" aria-hidden="true">
            </span> VideoJuegos</a></li>
        </ul>
        <p class="navbar-text navbar-left">
            <?= Html::a('Crear consulta', ['/consultas/create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

</div>

<div class="site-index">
    <div class="jumbotron">
        <h1>Bienvenido </h1>
        <?= Html::img('@web/fotos/logotipo.png', ['alt'=>'Logo']);?>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Temas de ayuda</h2>

                <p>aaaaaaaaaaaaAquí hay una relación de los principales temas donde otros usuarios han pedido ayuda o están siendo aclaradas dudas sobre todo tipo
                de temas profesionales como albañilería, informática, fontanería, abogacía, ...</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">ir a temas &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Ahora</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
</body>
