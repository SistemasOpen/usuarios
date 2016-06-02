<?php

namespace app\modules\administracion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administracion\models\Encuestavalores;

/**
 * EncuestavaloresSearch represents the model behind the search form about `app\modules\administracion\models\Encuestavalores`.
 */
class EncuestavaloresSearch extends Encuestavalores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idencuesta', 'idtipocompetencia'], 'integer'],
            [['individual', 'general', 'ponderacion', 'total'], 'number'],
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
        $query = Encuestavalores::find();

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
            'idtipocompetencia' => $this->idtipocompetencia,
            'individual' => $this->individual,
            'general' => $this->general,
            'ponderacion' => $this->ponderacion,
            'total' => $this->total,
        ]);

        return $dataProvider;
    }
}