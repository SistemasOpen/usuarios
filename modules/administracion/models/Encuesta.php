<?php

namespace app\modules\administracion\models;

use Yii;
use app\modules\administracion\models\Tipoencuesta;
use app\models\Categorias;

/**
 * This is the model class for table "encEncuesta".
 *
 * @property integer $id
 * @property integer $idTipoEncuesta
 * @property string $fDesde
 * @property string $fHasta 
 * @property integer $visible
 *
 * @property EncTipoEncuesta $idTipoEncuesta0
 * @property EncEncuestaCabeza[] $encEncuestaCabezas
 * @property EncEncuestaContenido[] $encEncuestaContenidos
 * @property EncCompetencia[] $idCompetencias
 * @property EncEvaluadoEvaluador[] $encEvaluadoEvaluadors
 */
class Encuesta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEncuesta';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbIntranet');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoEncuesta'], 'required'],
            [['idTipoEncuesta', 'visible', 'idRango'], 'integer'],
            [['descripcion'], 'string'],
            [['fDesde', 'fHasta'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'idTipoEncuesta' => 'Tipo de encuesta',
            'fDesde' => 'Desde fecha',
            'fHasta' => 'Hasta fecha',
            'visible' => 'Visible',
            'descripcion' => 'Descripción',
            'idRango' => 'Rango',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoEncuesta0()
    {
        return $this->hasOne(Tipoencuesta::className(), ['id' => 'idTipoEncuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestaCabezas()
    {
        return $this->hasMany(EncEncuestaCabeza::className(), ['idEncuesta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestaContenidos()
    {
        return $this->hasMany(EncEncuestaContenido::className(), ['idEncuesta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompetencias()
    {
        return $this->hasMany(EncCompetencia::className(), ['id' => 'idCompetencia'])->viaTable('encEncuestaContenido', ['idEncuesta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEvaluadoEvaluadors()
    {
        return $this->hasMany(EncEvaluadoEvaluador::className(), ['encuesta' => 'id']);
    }
    public function getCategoria0()
    {
        return $this->hasOne(encCategorias::className(), ['Id' => 'categoria']);
    }
    public function getRango0()
    {
        return $this->hasOne(Rango::className(), ['id' => 'idRango']);
    }

}
