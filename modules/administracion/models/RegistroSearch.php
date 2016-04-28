<?php

namespace app\modules\administracion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administracion\models\Registro;

/**
 * RegistroSearch represents the model behind the search form about `app\modules\administracion\models\Registro`.
 */
class RegistroSearch extends Registro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'usuario', 'tipomovimiento', 'encuesta'], 'integer'],
            [['fecha', 'observaciones'], 'safe'],
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
        $query = Registro::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           'sort' => [
                    'defaultOrder' => [
                        'fecha' => SORT_DESC,
                        'usuario' => SORT_DESC,
                    ]
            ],            

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'usuario' => $this->usuario,
            'fecha' => $this->fecha,
            'tipomovimiento' => $this->tipomovimiento,
            'encuesta' => $this->encuesta,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
