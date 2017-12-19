<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Consulta */
$this->title = 'Crear nueva consulta';
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Nueva consulta';
?>
<div class="consulta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'tipos' => $tipos,
    ]) ?>

</div>
