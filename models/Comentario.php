<?php
namespace app\models;
/**
 * This is the model class for table "comentarios".
 *
 * @property integer $id
 * @property string $comentario
 * @property string $fecha
 * @property integer $id_usuario
 * @property integer $id_consulta
 *
 * @property Consultas $idConsulta
 * @property Usuarios $idUsuario
 */
class Comentario extends \yii\db\ActiveRecord
{
    public $user;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarios';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comentario', 'id_usuario', 'id_consulta'], 'required'],
            [['comentario'], 'string'],
            [['fecha','user'], 'safe'],
            [['id_usuario', 'id_consulta'], 'integer'],
            [['id_consulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['id_consulta' => 'id']],
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
            'comentario' => 'Comentario',
            'fecha' => 'Fecha',
            'id_usuario' => 'Id Usuario',
            'id_consulta' => 'Id consulta',
            'user' => 'Usuario',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Consulta::className(), ['id' => 'id_consulta'])->inverseOf('comentarios');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario'])->inverseOf('comentarios');
    }

    public function getUser()
    {
        $this->user = $this->usuario->nombre;
        return $this->user;
    }

    public function getFecha()
    {
        return $this->$fecha;
    }
}
