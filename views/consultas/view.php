<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Consulta */
$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$formatter = \Yii::$app->formatter;
$fechaComentario = $formatter ->asDate( $model->publicado , 'long' );
?>
<div class="consulta-view panel panel-info" id="notVi" style="margin:60px 0px !important">


    <div class="page-header" >
        <h2 class="text-center"><a href="<?=$model->enlace ?>"> <?= $model->titulo ?></a></h2>
      </div>

    <p id="cuerpo"><?= $model->cuerpo ?></p>
    <div class="panel-footer">Publicado por "<?= $model->usuario->nombre ?>" el <?= $fechaComentario ?><span style="float:right">Comentarios (<?= $numComentarios; ?>)</span></div>
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
<hr />
<!-- comentarios  -->
<?php foreach ($comentarios as $comentario) {?>
    <div class="col-md-offset-1 col-md-7  bg-info arrow_box">
        <!-- <p>Autor del comentario:= $comentario->usuario->nombre ?></p> -->
        <p><?= $comentario->comentario ?></p>
        <!-- <p>Fecha comentario: $comentario->fecha ?></p> -->
        <br/>
    </br/>
    </div>
    <div class="col-md-offset-1 col-md-3" >
        <p class="text-center">
            Publicado por <?= $comentario->usuario->nombre ?>
        </br/>
        <?= Html::img($comentario->usuario->rutaImagen, ['title' => 'Imagen de ' . $comentario->usuario->nombre  ,
         'width' => '125px', 'height'=>'80px']); ?>
        </p>
        <img src="" alt="">
    </div>
    <?php } ?>

<!-- //$this->render('../comentarios/_form', ['model' => $comentarioNuevo]) -->
<!-- // Yii::$app->controller->renderPartial('../comentarios/_form', ['model' => $comentarioNuevo]); -->
