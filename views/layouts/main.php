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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">
        .my-navbar {
            background-color: #fc6000;
            color: white;
        }
        .navbar-text {
            background-color: lightgrey;
        }
        p.navbar-text a {
            color: #fc6000;
            background-color: lightgrey;
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
            ['label' => 'Noticias', 'url' => ['/noticias/index']],
            // ['label' => 'Conócenos', 'url' => ['/site/about']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Mi perfil', 'url' => ['/site/login']]
                ) : (
                    ['label' => 'Mi perfil', 'url' => ['/usuarios/view', 'id' => Yii::$app->user->identity->id],]
            ),
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

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
