<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Depositos;

/**
 * DepositosSearch represents the model behind the search form about `app\models\Depositos`.
 */
class DepositosSearch extends Depositos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'codigo', 'empresa', 'tienesectores', 'cerrado', 'tipodeposito'], 'integer'],
            [['nombre', 'domicilio', 'localidad', 'telefono', 'celular', 'horario', 'encargado', 'correo', 'correoencargado', 'perfil', 'observaciones'], 'safe'],
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
        $query = Depositos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           'sort' => [
                    'defaultOrder' => [
                        'localidad' => SORT_ASC,
                        'empresa' => SORT_ASC,
                        'codigo' => SORT_ASC,
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
            'codigo' => $this->codigo,
            'empresa' => $this->empresa,
            'tienesectores' => $this->tienesectores,
            'cerrado' => $this->cerrado,
            'tipodeposito' => $this->tipodeposito,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'horario', $this->horario])
            ->andFilterWhere(['like', 'encargado', $this->encargado])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'correoencargado', $this->correoencargado])
            ->andFilterWhere(['like', 'perfil', $this->perfil])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
