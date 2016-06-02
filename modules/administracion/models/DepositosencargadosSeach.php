<?php

namespace app\modules\administracion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administracion\models\Depositosencargados;

/**
 * DepositosencargadosSeach represents the model behind the search form about `app\modules\administracion\models\Depositosencargados`.
 */
class DepositosencargadosSeach extends Depositosencargados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'iddeposito', 'idencargado'], 'integer'],
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
        $query = Depositosencargados::find();

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
            'iddeposito' => $this->iddeposito,
            'idencargado' => $this->idencargado,
        ]);

        return $dataProvider;
    }
}