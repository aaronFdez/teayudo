<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NoticiaSearch */
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
            ['class' => 'yii\grid\SerialColumn'],
            'id_consulta',
            'id_usuario',
            'titulo',
            'cuerpo',
            'meneos',
            // 'url:url',
            // 'created_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
