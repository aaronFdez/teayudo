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


    <div class="page-header" id ="headComentario" style="text-align:center;margin-top:15px">
        <?= Html::img($model->usuario->rutaImagen, ['title' => 'Imagen de ' . $model->usuario->nombre  ,
         'id' => 'fototitulo','width'=>'165px']); ?>
        <h2 class="text-center"><a href="<?=$model->enlace ?>"> <?= $model->titulo ?></a></h2>
      </div>

    <p id="cuerpo"><?= $model->cuerpo ?></p>
    <div class="panel-footer">Publicado por "<?= $model->usuario->nombre ?>" el <?= $fechaComentario ?><span style="float:right">Comentarios (<?= $numComentarios; ?>)</span></div>
</div>
<div class="botonComentar">
        <p>
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
    <div class="col-md-offset-1 col-md-7  bg-info arrow_box" style="padding-top:10px">
        <p ><?= $comentario->comentario ?></p>
    </br/>
    </div>
    <div class="col-md-3" >
        <p class="text-center">
            Publicado por <?= $comentario->usuario->nombre ?>
        </br/>
        <?= Html::img($comentario->usuario->rutaImagen, ['title' => 'Imagen de ' . $comentario->usuario->nombre  ,
         'id' => 'fotoComentario','width'=>'125px','height'=>'80px' ]); ?>
        </p>
    </div>
    <div class="col-md-1">
        <p id=voto>
            <br>
            <?= Html::a(
                'Me gusta',
                ['../usuarios/votar', 'id' => $comentario->usuario->id, 'id_consulta' => $model->id],
                ['class' => 'btn btn-success']
            ); ?>
        </p>
    </div>
    <?php } ?>
