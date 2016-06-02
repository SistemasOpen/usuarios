<?php

namespace app\modules\administracion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administracion\models\Encuestapublica;

/**
 * EncuestapublicaSearch represents the model behind the search form about `app\modules\administracion\models\Encuestapublica`.
 */
class EncuestapublicaSearch extends Encuestapublica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idencuesta', 'idEvaluado', 'idEvaluador'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = Encuestapublica::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'idencuesta' => $this->idencuesta,
            'idEvaluado' => $this->idEvaluado,
            'idEvaluador' => $this->idEvaluador,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}
