<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\components\UsuariosHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
                    return Html::encode($model->tipoConsulta->tipo);
                },
                'format' => 'html',
                'label' => 'Tipo consulta',
                'filter' => UsuariosHelper::tipoConsulta(),
            ],
            'publicado:datetime',
            [
                'attribute' => 'id_usuario',
                'value' => function ($model, $widget) {
                    return Html::encode($model->usuario->nombre);
                },
                'format' => 'html',
                'label' => 'Nombre del autor',
            ],
        ],
    ]); ?>
</div>
