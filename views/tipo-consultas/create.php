<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\TipoConsulta */
$this->title = 'Create Tipo Consulta';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-consulta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
