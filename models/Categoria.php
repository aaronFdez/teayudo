<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "categorias".
 *
 * @property integer $id_categoria
 * @property string $nombre
 *
 * @property NoticiasCategorias[] $noticiasCategorias
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorias';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 20],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'nombre' => 'Nombre',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultasCategorias()
    {
        return $this->hasMany(ConsultasCategorias::className(), ['id_categoria' => 'id_categoria'])->inverseOf('idCategoria');
    }
    /** Devuleve las noticias de un usuario identificado por id
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasOne(Consulta::className(), ['id_categoria' => 'id_categoria'])->inverseOf('categorias');
    }
}
