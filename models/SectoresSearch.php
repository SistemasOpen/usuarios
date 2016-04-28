<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sectores;

/**
 * SectoresSearch represents the model behind the search form about `app\models\Sectores`.
 */
class SectoresSearch extends Sectores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idgerencia', 'tieneareas', 'visible'], 'integer'],
            [['nombre', 'direccion', 'telefono', 'mail', 'encargado', 'horario', 'observaciones'], 'safe'],
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
        $query = Sectores::find();

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
            'idgerencia' => $this->idgerencia,
            'tieneareas' => $this->tieneareas,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'encargado', $this->encargado])
            ->andFilterWhere(['like', 'horario', $this->horario])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
