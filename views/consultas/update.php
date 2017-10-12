<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Noticia */
$this->title = 'Modificar consulta: ' . $model->id_consulta;
$this->params['breadcrumbs'][] = ['label' => 'Consulta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_consulta, 'url' => ['view', 'id' => $model->id_consulta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consulta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
