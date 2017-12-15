<?php
use app\components\UsuariosHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Ranking de usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
<?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'Posición',
            ],
            [
                'label' => 'Imagen del usuario',
                'format' => 'image',
                'value' => 'rutaImagen',
                'contentOptions'=>['id'=>'foto']
            ],
            'nombre',
            'votos',
        ],
    ]); ?>
</div>
    <?php Pjax::end() ?>
