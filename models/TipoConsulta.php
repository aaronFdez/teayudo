<?php
namespace app\models;
/**
 * This is the model class for table "tipo_consulta".
 *
 * @property integer $id
 * @property string $tipo
 *
 * @property Consultas[] $consultas
 */
class TipoConsulta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_consulta';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo'], 'string', 'max' => 255],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['tipo_consulta' => 'id'])->inverseOf('tipoConsulta');
    }
}
