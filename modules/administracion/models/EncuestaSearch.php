<?php

namespace app\modules\administracion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administracion\models\Encuesta;

/**
 * EncuestaSearch represents the model behind the search form about `app\modules\administracion\models\Encuesta`.
 */
class EncuestaSearch extends Encuesta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idTipoEncuesta', 'visible', 'idRango'], 'integer'],
            [['descripcion'], 'string'],
            [['fDesde', 'fHasta'], 'safe'],
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
        $query = Encuesta::find()->where('fDesde is null');

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
            'idTipoEncuesta' => $this->idTipoEncuesta,
            'fDesde' => $this->fDesde,
            'fHasta' => $this->fHasta,
            'visible' => $this->visible,
            'descripcion' => $this->descripcion,
            'idRango'=>$this->idRango,
        ]);

        return $dataProvider;
    }

    public function publicadas($params)
    {
        $query = Encuesta::find()->where("fDesde <> null and fHasta >'" . date('Ymd') . "'" );

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
            'idTipoEncuesta' => $this->idTipoEncuesta,
            'fDesde' => $this->fDesde,
            'fHasta' => $this->fHasta,
            'visible' => $this->visible,
            'descripcion' => $this->descripcion,
            'idRango'=>$this->idRango,
        ]);

        return $dataProvider;
    }

    public function finalizadas($params)
    {
        $query = Encuesta::find()->where('fHasta < getdate()');

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
            'idTipoEncuesta' => $this->idTipoEncuesta,
            'fDesde' => $this->fDesde,
            'fHasta' => $this->fHasta,
            'visible' => $this->visible,
            'descripcion' => $this->descripcion,
            'idRango'=>$this->idRango,
        ]);

        return $dataProvider;
    }


}
