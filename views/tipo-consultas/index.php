<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Tipo Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-consulta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Consulta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'tipo',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
