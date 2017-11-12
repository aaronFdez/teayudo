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
    <div class="media">
        <div class="media-left">
             <?= Html::img($model->rutaImagen, ['title' => 'Imagen de ' . $model->nombre  ,
              'width' => 'auto', 'height'=>'140px']); ?>
         </div>
            <div class="media-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'nombre',
                        [
                            'attribute' => 'tipo',
                            'value' => $model->tipoUsuario,
                        ],
                        [
                            'attribute' => 'miniatura',
                            'value' => $model->rutaImagen,
                            'format' => 'image',
                        ],
                    ],
                ]) ?>
            </div>

                 </div>
<h2>Consultas publicadas</h2>

    <?php Pjax::begin() ?>

    <?= GridView::widget([
        'dataProvider' => $dataProviderConsultas,
        'columns' => [
            [
                'attribute' => 'nombre',
                'value' => function ($model, $widget) {
                    return Html::a(
                        Html::encode($model->titulo),
                        ['consultas/view', 'id' => $model->id]
                    );
                },
                'format' => 'html',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'consultas'
            ],
        ],
    ]) ?>

    <?php Pjax::end() ?>
</div>
