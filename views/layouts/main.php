<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use app\components\UsuariosHelper;
use app\widgets\Notificacion;
use yii\helpers\Html;
use app\helpers\Mensaje;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$url= "images/logo.png";

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="description" content="Nueva web donde te ayudamos con tus consultas o puedes ayudar con tus conocimientos"  />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">
        .navbar-inverse{
            background-color: #0c406f !important;
            color: white;
        }

        .active a{
            background-color: inherit !important;
            border-bottom: 1px solid white;
            margin-bottom: 5px;
        }
        .navbar-text {
            background-color: blue; //lightgrey
        }
        p.navbar-text a {
            color: #fc6000;
            background-color: lightgrey;
        }

        #w3 > li:nth-child(6) > form > button, #w1 > li:nth-child(6) > form > button {
            font-size:0.9vw;
        }
    </style>
    <?= Html::csrfMetaTags() ?>
    <?= Html::img('images/logo.png');?>
    <title>Te Ayudo</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Inicio',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Consultas', 'url' => ['/consultas/index']],
            ['label' => 'Ranking', 'url' => ['/usuarios/ranking']],
            ['label' => 'Conócenos', 'url' => ['/site/about']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Mi perfil', 'url' => ['/site/login']]
                ) : (
                    ['label' => 'Mi perfil', 'url' => ['/usuarios/view', 'id' => Yii::$app->user->identity->id],]
            ),
            ['label' => 'Contacto', 'url' => ['/site/contact']],
            UsuariosHelper::isAdmin() ? (
                ['label' => 'Usuarios', 'url' => ['usuarios/index']]
            ) : '',
            UsuariosHelper::menu(),
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Notificacion::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Te Ayudo &copy;  ( <?= date('d M Y') ?> ) </p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
