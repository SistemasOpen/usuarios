<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'legajo', 'empresa', 'gerencia', 'sector', 'area', 'categoria', 'admin', 'cambiapass', 'documento', 'activo'], 'integer'],
            [['nombre', 'username', 'webpass', 'password', 'ultimoacceso', 'fechamodificacion'], 'safe'],
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
        $query = Usuario::find()->where('legajo <> 0') ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           'sort' => [
                    'defaultOrder' => [
                        'fechaalta' => SORT_DESC,
                    ]
            ],            

        ]);

/*
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           'sort' => [
                    'defaultOrder' => [
                        'empresa' => SORT_ASC,
                        'legajo' => SORT_ASC, 
                    ]
            ],            

        ]);
*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'legajo' => $this->legajo,
            'empresa' => $this->empresa,
            'gerencia' => $this->gerencia,
            'sector' => $this->sector,
            'area' => $this->area,
            'categoria' => $this->categoria,
            'admin' => $this->admin,
            'cambiapass' => $this->cambiapass,
            'ultimoacceso' => $this->ultimoacceso,
            'documento' => $this->documento,
            'activo' => $this->activo,
            'fechamodificacion' => $this->fechamodificacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'webpass', $this->webpass])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }

    public function buscaradm($params)
    {
        $query = Usuario::find()->where('empresa = 1 and gerencia < 7') ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           'sort' => [
                    'defaultOrder' => [
                        'puesto' => SORT_ASC, 
                        'empresa' => SORT_ASC,
                        'legajo' => SORT_ASC, 
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
            'legajo' => $this->legajo,
            'empresa' => $this->empresa,
            'gerencia' => $this->gerencia,
            'sector' => $this->sector,
            'area' => $this->area,
            'categoria' => $this->categoria,
            'admin' => $this->admin,
            'cambiapass' => $this->cambiapass,
            'ultimoacceso' => $this->ultimoacceso,
            'documento' => $this->documento,
            'activo' => $this->activo,
            'fechamodificacion' => $this->fechamodificacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'webpass', $this->webpass])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }

    public function buscarlocal($params)
    {
        $query = Usuario::find()->where('empresa = 1 and gerencia = 7') ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           'sort' => [
                    'defaultOrder' => [
                        'nombre' => SORT_ASC, 
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
            'legajo' => $this->legajo,
            'empresa' => $this->empresa,
            'gerencia' => $this->gerencia,
            'sector' => $this->sector,
            'area' => $this->area,
            'categoria' => $this->categoria,
            'admin' => $this->admin,
            'cambiapass' => $this->cambiapass,
            'ultimoacceso' => $this->ultimoacceso,
            'documento' => $this->documento,
            'activo' => $this->activo,
            'fechamodificacion' => $this->fechamodificacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'webpass', $this->webpass])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }


}


