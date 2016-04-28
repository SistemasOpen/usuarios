<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Memo;

/**
 * MemoSearch represents the model behind the search form about `app\models\Memo`.
 */
class MemoSearch extends Memo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numero', 'gerencia', 'sector', 'area', 'manual', 'creador', 'vigente'], 'integer'],
            [['titulo', 'texto', 'tags', 'fechacreacion', 'fechamodificacion', 'fechainicio', 'fechafin'], 'safe'],
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
        $query = Memo::find()->where('gerencia ='.Yii::$app->user->identity->gerencia ) ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           'sort' => [
                    'defaultOrder' => [
                        'gerencia' => SORT_ASC,
                        'sector' => SORT_ASC,
                        'area' => SORT_ASC,
                        'numero' => SORT_DESC,
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
            'numero' => $this->numero,
            'gerencia' => $this->gerencia,
            'sector' => $this->sector,
            'area' => $this->area,
            'manual' => $this->manual,
            'fechacreacion' => $this->fechacreacion,
            'fechamodificacion' => $this->fechamodificacion,
            'fechainicio' => $this->fechainicio,
            'fechafin' => $this->fechafin,
            'creador' => $this->creador,
            'vigente' => $this->vigente,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'texto', $this->texto])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
