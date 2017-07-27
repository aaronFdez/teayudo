<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Conócenos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jumbotron">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::img('@web/fotos/logotipo.png', ['alt'=>'Logo']);?>
    <p><br/>
        Esta aplicación web crea un espacio común para usuarios de distintos perfiles. Unos usuarios
        buscarán soluciones para sus dudas y otros les prestará su ayuda altruista. <br/><br/>
        Queremos dar esta potente herramienta a usuarios que no necesitan un conocimiento avanzado
        para porder usarla. Para ello usaremos una interfaz amigable y sencilla con el fin de que usuarios
        de todas las edades y niveles de informática. <br/><br/>
        Los usuarios crearán una petición sobre un tema catalogado y otros usuarios que estén interesados
        sobre ese tema recibiran un correo con un enlace a la petición de ayuda. Los demás usuarios
        podrán intercambiar ideas o dar consejos en sus comentarios y serán valorados según valía.<br/><br/>
    </p>
    <h3>Los usuarios con mayor valoración serán homenajeados cada mes en un cuadro de honor</h3>
</div>
