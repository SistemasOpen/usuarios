<?php

namespace app\modules\administracion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administracion\models\Desarrollo;

/**
 * DesarrolloSearch represents the model behind the search form about `app\modules\administracion\models\Desarrollo`.
 */
class DesarrolloSearch extends Desarrollo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idCompetencia', 'valor_desarrollo', 'idCategoria_usuario', 'visible'], 'integer'],
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
        $query = Desarrollo::find();

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
            'idCompetencia' => $this->idCompetencia,
            'valor_desarrollo' => $this->valor_desarrollo,
            'idCategoria_usuario' => $this->idCategoria_usuario,
            'visible' => $this->visible,
        ]);

        return $dataProvider;
    }
}
