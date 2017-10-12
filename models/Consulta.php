<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "noticias".
 *
 * @property integer $id_noticia
 * @property integer $id_usuario
 * @property string $titulo
 * @property string $cuerpo
 * @property string $meneos
 * @property string $url
 * @property string $created_at
 *
 * @property ComentariosNoticias[] $comentariosNoticias
 * @property User $idUsuario
 */
class Consulta extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultas';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_categoria'], 'integer'],
            [['titulo', 'cuerpo', 'id_categoria'], 'required'],
            [['created_at'], 'safe'],
            [['titulo'], 'string', 'max' => 55],
            [['cuerpo'], 'string', 'max' => 500],
            [['url'], 'string', 'max' => 200],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_noticia' => 'Id Noticia',
            'id_usuario' => 'Id Usuario',
            'titulo' => 'Titulo',
            'cuerpo' => 'Cuerpo',
            'meneos' => 'Meneos',
            'url' => 'Url',
             'id_categoria' => 'Id Categoria',
            'created_at' => 'Created At',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentariosConsultas()
    {
        return $this->hasMany(ComentariosConsultas::className(), ['id_consulta' => 'id_consulta'])->inverseOf('idConsulta');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario'])->inverseOf('consultas');
    }

    public function getComentarios()
    {
        return $this->hasMany(\yii2mod\comments\models\CommentModel::className(), ['entityId' => 'id_noticia'])->count();
    }

    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'id_categoria'])->inverseOf('consultas');
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->id_usuario = Yii::$app->user->identity->id;
                //$this->meneos = 0;
            }
            return true;
        } else {
            return false;
        }
    }

    public $categorias;

}
