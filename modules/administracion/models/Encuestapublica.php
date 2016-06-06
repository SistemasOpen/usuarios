<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encEncuestaPublica".
 *
 * @property integer $id
 * @property integer $idencuesta
 * @property integer $idEvaluado
 * @property integer $idEvaluador
 * @property string $fecha
 *
 * @property EncComentarios[] $encComentarios
 * @property EncEncuestaAspecto[] $encEncuestaAspectos
 * @property EncEncuestaDetalle[] $encEncuestaDetalles
 * @property EncEncuestaObjetivo[] $encEncuestaObjetivos
 * @property EncEncuesta $idencuesta0
 * @property EncEncuestaValores[] $encEncuestaValores
 */
class Encuestapublica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEncuestaPublica';
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
            [['idencuesta', 'idEvaluado', 'idEvaluador', 'encRelacionada'], 'integer'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idencuesta' => 'Encuesta',
            'idEvaluado' => 'Id Evaluado',
            'idEvaluador' => 'Id Evaluador',
            'fecha' => 'Fecha',
            'encRelacionada' => 'Relacionada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(EncComentarios::className(), ['idpublica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestaAspectos()
    {
        return $this->hasMany(EncEncuestaAspecto::className(), ['idpublica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestaDetalles()
    {
        return $this->hasMany(EncEncuestaDetalle::className(), ['idpublica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestaObjetivos()
    {
        return $this->hasMany(EncEncuestaObjetivo::className(), ['idpublica' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdencuesta0()
    {
        return $this->hasOne(EncEncuesta::className(), ['id' => 'idpublica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestaValores()
    {
        return $this->hasMany(EncEncuestaValores::className(), ['idpublica' => 'id']);
    }
}
