<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear consulta', ['create'], ['class' => 'btn btn-success']) ?>
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
                        ['consultas/view', 'id' => $model->id]
                    );
                },
                'label' => 'Origen',
                'format' => 'html',
            ],
            [
                'attribute' => 'tipo_consulta',
                'value' => function ($model, $widget) {
                    return Html::a(
                        Html::encode($model->tipoConsulta->tipo),
                        ['tipo-consultas/view', 'id' => $model->tipo_consulta]
                    );
                },
                'format' => 'html',
                'label' => 'Tipo consulta',
            ],
            'publicado:datetime',
            // 'tipo_consulta',
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
