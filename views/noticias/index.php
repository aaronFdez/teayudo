<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NoticiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Noticias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear noticia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'titulo',
                'value' => function ($model, $widget) {
                    return Html::a(
                        Html::encode($model->titulo),
                        ['noticias/view', 'id' => $model->id]
                    );
                },
                'label' => 'Origen',
                'format' => 'html',
            ],
            [
                'attribute' => 'tipo_noticia',
                'value' => function ($model, $widget) {
                    return Html::a(
                        Html::encode($model->tipoNoticia->tipo),
                        ['tipo-noticias/view', 'id' => $model->tipo_noticia]
                    );
                },
                'format' => 'html',
                'label' => 'Tipo noticia',
            ],
            'publicado:datetime',
            // 'tipo_noticia',
            // ,
            [
                'attribute' => 'id_usuario',
                'value' => function ($model, $widget) {
                    return Html::a(
                        Html::encode($model->usuario->nombre),
                        ['usuarios/view', 'id' => $model->usuario->id]
                    );
                },
                'format' => 'html',
                'label' => 'Nombre del autor',
            ],
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
