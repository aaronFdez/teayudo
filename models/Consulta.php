<?php
namespace app\models;
/**
 * This is the model class for table "consultas".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $cuerpo
 * @property string $enlace
 * @property string $publicado
 * @property integer $tipo_consulta
 * @property integer $id_usuario
 *
 * @property Comentarios[] $comentarios
 * @property TipoConsulta $tipoConsulta
 * @property Usuarios $idUsuario
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
            [['titulo', 'cuerpo',  'tipo_consulta','id_usuario' ], 'required'], // quito id_usuario
            [['cuerpo'], 'string'],
            [['publicado','enlace',], 'safe'],
            [['tipo_consulta','id_usuario'], 'integer'],// quito id_usuario
            [['titulo', 'enlace'], 'string', 'max' => 255],
            [['tipo_consulta'], 'exist', 'skipOnError' => true, 'targetClass' => TipoConsulta::className(), 'targetAttribute' => ['tipo_consulta' => 'id']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'cuerpo' => 'Cuerpo',
            'enlace' => 'Enlace',
            'publicado' => 'Publicado',
            'tipo_consulta' => 'Tipo Consulta',
            'id_usuario' => 'Id Usuario',
        ];
    }

    public function getTipo()
    {
        return $this->tipo_consulta;

    }

    /**
     * Devuelve el número de comentarios que tiene una consulta concreta
     * @param  int $id_consulta El id de la consulta
     * @return int El número de comentarios que tiene la consulta pasada como parametro
     */
    // public function cuantosComentarios($id_consulta)
    // {
    //     return $comentarios = $this->getComentarios()->where(['id_consulta' => $id_consulta])->count();
    // }
    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getComentarios()
    // {
    //     return $this->hasMany(Comentario::className(), ['id_consulta' => 'id'])->inverseOf('idConsulta');
    // }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoConsulta()
    {
        return $this->hasOne(TipoConsulta::className(), ['id' => 'tipo_consulta'])->inverseOf('consultas');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario'])->inverseOf('consultas');
    }

    public function getNombre()
    {
        return $this->usuario->nombre;
    }
}
