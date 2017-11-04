<?php
use app\components\UsuariosHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => $model->nombre . ' , ¿está seguro que quiere borrar esta cuenta?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            [
                'attribute' => 'tipo',
                'value' => $model->tipoUsuario,
            ],
            [
                'attribute' => 'foto',
                'value' => $model->rutaImagen,
                'format' => 'image',
            ],
        ],
    ]) ?>

<h2>Noticias publicadas</h2>

    <?php Pjax::begin() ?>

    <?= GridView::widget([
        'dataProvider' => $dataProviderNoticias,
        'columns' => [
            [
                'attribute' => 'nombre',
                'value' => function ($model, $widget) {
                    return Html::a(
                        Html::encode($model->titulo),
                        ['noticias/view', 'id' => $model->id]
                    );
                },
                'format' => 'html',
            ],
        ],
    ]) ?>

    <?php Pjax::end() ?>
</div>
