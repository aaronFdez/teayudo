<?php
namespace app\models;
use yii\base\Model;
use yii\data\Sort;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Consulta;
/**
 * ConsultaSearch represents the model behind the search form about `app\models\Consulta`.
 */
class ConsultaSearch extends Consulta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','tipo_consulta','id_usuario' ], 'integer'],
            [['titulo', 'cuerpo', 'enlace', 'publicado'], 'safe'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Consulta::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => new Pagination([
                 'pageSize' => 4,
             ]),
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'publicado' => $this->publicado,
            'tipo_consulta' => $this->tipo_consulta,
            'id_usuario' => $this->id_usuario,
        ]);
        $query->andFilterWhere(['ilike', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo])
            ->andFilterWhere(['like', 'enlace', $this->enlace]);
        return $dataProvider;
    }
}
