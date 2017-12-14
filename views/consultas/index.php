<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\components\UsuariosHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-2">
            <p style="margin-top:20%">
                <?= Html::a('Crear consulta', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
            <div class="col-md-2">
                    <?= Html::img('@web/fotos/hogar.jpg', ['alt'=>'hogar','width'=>'100%']);?>
                <p class="text-center">Hogar</p>
            </div>
            <div class="col-md-2">
                    <?= Html::img('@web/fotos/ley.jpg', ['alt'=>'hogar','width'=>'100%']);?>
                <p class="text-center">Legal</p>
            </div>
            <div class="col-md-2">
                    <?= Html::img('@web/fotos/tecno.jpg', ['alt'=>'hogar','width'=>'100%']);?>
                <p class="text-center">Tecnología</p>
            </div>
            <div class="col-md-2">
                    <?= Html::img('@web/fotos/juego.jpg', ['alt'=>'hogar','width'=>'100%']);?>
                <p class="text-center">Videojuegos</p>
            </div>
            <div class="col-md-2">
                    <?= Html::img('@web/fotos/otros.jpg', ['alt'=>'hogar','width'=>'100%']);?>
                <p class="text-center">Otros</p>
            </div>
    </div>
    <hr>
    <?php Pjax::begin() ?>
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
                'label' => 'Título de la consulta',
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
            [
                'attribute' => 'publicado',
                'label' => 'Fecha de publicación',
                'format' => ['datetime', 'php:H:i  d/m/Y'] ,
                'filter' =>false,
            ],
            [
                'attribute' => 'id_usuario',
                'value' => function ($model, $widget) {
                    return Html::encode($model->usuario->nombre);
                },
                'format' => 'html',
                'label' => 'Nombre del autor',
                'filter' =>false,
            ],
        ],
    ]); ?>
</div>
<?php Pjax::end() ?>
