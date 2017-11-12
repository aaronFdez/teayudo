<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Consulta */
$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$formatter = \Yii::$app->formatter;
$fecha = $formatter ->asDate( $model->publicado , 'long' );
?>
<p class="notPub">
    Consulta publicada el <?= $fecha ?> por el usuario  "<?= $model->usuario->nombre ?>"
</p>
<div class="consulta-view" id="notVi">


    <div class="page-header">
        <h2><a href="<?=$model->enlace ?>"> <?= $model->titulo ?></a></h2>
      </div>

    <p id="cuerpo"><?= $model->cuerpo ?></p>
    <!-- <h3>Comentarios (?= $numComentarios; ?>)</h3><br><br> -->
</div>
<?php foreach ($comentarios as $comentario) {?>
    <div class="bg-info">
        <!-- <p>Autor del comentario:= $comentario->usuario->nombre ?></p> -->
        <p><?= $comentario->comentario ?></p>
        <!-- <p>Fecha comentario: $comentario->fecha ?></p> -->
    </div>
    <?php } ?>
</div>
<div class="botonComentar">
        <p>
            <!-- Html::a('Profile', ['user/view', 'id' => $id], ['class' => 'profile-link'])  -->
            <?= Html::a(
                'Comentar',
                ['../comentarios/create', 'id_consulta' => $model->id],
                ['class' => 'btn btn-success']
            ); ?>
        </p>
</div>
<!-- //$this->render('../comentarios/_form', ['model' => $comentarioNuevo]) -->
<!-- // Yii::$app->controller->renderPartial('../comentarios/_form', ['model' => $comentarioNuevo]); -->
