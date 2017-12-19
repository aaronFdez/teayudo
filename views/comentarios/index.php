<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ComentarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Comentarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear comentario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'comentario:ntext',
            'fecha',
            'id_usuario',
            'id_consulta',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
