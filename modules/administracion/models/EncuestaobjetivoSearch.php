<?php

namespace app\modules\administracion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administracion\models\Encuestaobjetivo;

/**
 * EncuestaobjetivoSearch represents the model behind the search form about `app\modules\administracion\models\Encuestaobjetivo`.
 */
class EncuestaobjetivoSearch extends Encuestaobjetivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idpublica', 'nivel', 'recondacion'], 'integer'],
            [['texto'], 'safe'],
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
        $query = Encuestaobjetivo::find();

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
            'idpublica' => $this->idpublica,
            'nivel' => $this->nivel,
            'recondacion' => $this->recondacion,
        ]);

        $query->andFilterWhere(['like', 'texto', $this->texto]);

        return $dataProvider;
    }
}
