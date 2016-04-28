<?php

namespace app\modules\administracion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administracion\models\Encuestacontenido;

/**
 * EncuestacontenidoSearch represents the model behind the search form about `app\modules\administracion\models\Encuestacontenido`.
 */
class EncuestacontenidoSearch extends Encuestacontenido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEncuesta', 'idCompetencia', 'tipocompetencia'], 'integer'],
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
        $query = Encuestacontenido::find();

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
            'idEncuesta' => $this->idEncuesta,
            'idCompetencia' => $this->idCompetencia,
            'tipocompetencia' => $this->tipocompetencia,
        ]);

        return $dataProvider;
    }
}
