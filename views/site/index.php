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
    @-webkit-keyframes swing
    {
    15%
    {
    -webkit-transform: translateX(5px);
    transform: translateX(5px);
    }
    30%
    {
    -webkit-transform: translateX(-5px);
    transform: translateX(-5px);
    }
    50%
    {
    -webkit-transform: translateX(3px);
    transform: translateX(3px);
    }
    65%
    {
    -webkit-transform: translateX(-3px);
    transform: translateX(-3px);
    }
    80%
    {
    -webkit-transform: translateX(2px);
    transform: translateX(2px);
    }
    100%
    {
    -webkit-transform: translateX(0);
    transform: translateX(0);
    }
    }
    @keyframes swing
    {
    15%
    {
    -webkit-transform: translateX(5px);
    transform: translateX(5px);
    }
    30%
    {
    -webkit-transform: translateX(-5px);
    transform: translateX(-5px);
    }
    50%
    {
    -webkit-transform: translateX(3px);
    transform: translateX(3px);
    }
    65%
    {
    -webkit-transform: translateX(-3px);
    transform: translateX(-3px);
    }
    80%
    {
    -webkit-transform: translateX(2px);
    transform: translateX(2px);
    }
    100%
    {
    -webkit-transform: translateX(0);
    transform: translateX(0);
    }
}
        .swing:hover {
            -webkit-animation: swing 1s ease;
            animation: swing 1s ease;
            -webkit-animation-iteration-count: 1;
            animation-iteration-count: 1;
        }
    </style>
</head>

<body>

<div class="site-index">

    <div class="container">
        <ul class="nav nav-pills nav-justified" id="indexBotones">
            <li><a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=1"><span class="glyphicon glyphicon-home" aria-hidden="true">
            </span> Hogar</a></li>
            <li><a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=2"><span class="glyphicon glyphicon-education" aria-hidden="true">
            </span> Abogados</a></li>
            <li><a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=3"><span class="glyphicon glyphicon-phone" aria-hidden="true">
            </span> Tecnología</a></li>
            <li><a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=4"><span class="glyphicon glyphicon-knight" aria-hidden="true">
            </span> VideoJuegos</a></li>
            <li><a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=5"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true">
            </span> Otros</a></li>
        </ul>

    </div>

</div>

<div class="site-index">
    <div class="jumbotron">
        <h1>Bienvenido a </h1>
        <?= Html::img('@web/fotos/logotipo.png', ['alt'=>'Logo']);?>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 swing">
                <a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=1">
                    <?= Html::img('@web/fotos/hogar.jpg', ['alt'=>'hogar']);?>
                </a>
                <h2>Ayuda para el hogar</h2>
                <p>Si necesitas ayuda con cualquier tema relacionado con el hogar nuestros usuarios expertos te ayudarán.
                Por otra parte si eres un "manitas" no dudes en ayudar a quienes los necesitan aportando tu sabiduría</p>
            </div>
            <div class="col-lg-4 swing">
                <a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=2">
                <?= Html::img('@web/fotos/ley.jpg', ['alt'=>'leyes']);?>
                </a>
                <h2>Temas legales</h2>
                <p>Sección para nuestros usuarios que tengan dudas sobre temas legales o burocráticos.
                    Los usuarios que tengan conocimientos sobre el leyes aportarán ideas y soluciones a otros usuarios necesitados
                    de sus aportaciones.
                </p>

            </div>
            <div class="col-lg-4 swing">
                <a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=3">
                <?= Html::img('@web/fotos/tecno.jpg', ['alt'=>'tecnologia']);?>
            </a>
                <h2>Espacio tecnológico</h2>
                <p>Aquí nuestros usuarios con nivel avanzado en tecnologías pondrán a prueba sus conocimientos sobre éstas
                ayudando a otros que consulten sus dudas</p>
            </div>
        </div>
        <div class="" style="margin-bottom:70px">
        </div>
        <div class="row">
            <div class="col-lg-offset-1 col-lg-4 swing">
                <a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=4">
                <?= Html::img('@web/fotos/juego.jpg', ['alt'=>'videojuegos']);?>
            </a>
                <h2>VideoJuegos</h2>
                <p>¿Estás atascado?. Crea una consulta y no pierdas más tiempo, nuestros usuarios gamers
                te ayudarán con sus conociemientos. Si puedes ayudar a un usuario atascado coméntale su consulta y
            alégrale el día</p>
            </div>

            <div class="col-lg-offset-1 col-lg-4 swing">
                <a href="consultas/index?ConsultaSearch%5Btipo_consulta%5D=5">
                <?= Html::img('@web/fotos/otros.jpg', ['alt'=>'otros']);?>
            </a>
                <h2>Otros</h2>
                <p>En esta sección abarcamos el resto del mundo como consultas sobre mascotas, coches, mecánica, etc...</p>
            </div>
        </div>
    </div>
</div>
</body>
