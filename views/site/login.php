<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Logueo';
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">
        #w1 > li:nth-child(4) a{
            border:none !important;
        }
    </style>
    </head>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Introduzca su nombre y contraseña:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group" style=display:table-cell;>

                <?= Html::submitButton('Acceder', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>

                <?= Html::a('Registrarse', ['usuarios/create'], ['class' => 'btn btn-success']) ?>

        </div>

    <?php ActiveForm::end(); ?>

</div>
