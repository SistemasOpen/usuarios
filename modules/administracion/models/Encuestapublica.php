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
            [['idencuesta', 'idEvaluado', 'idEvaluador'], 'integer'],
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
            'idencuesta' => 'Idencuesta',
            'idEvaluado' => 'Id Evaluado',
            'idEvaluador' => 'Id Evaluador',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncComentarios()
    {
        return $this->hasMany(EncComentarios::className(), ['idencuesta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestaAspectos()
    {
        return $this->hasMany(EncEncuestaAspecto::className(), ['idencuesta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestaDetalles()
    {
        return $this->hasMany(EncEncuestaDetalle::className(), ['idencuesta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestaObjetivos()
    {
        return $this->hasMany(EncEncuestaObjetivo::className(), ['idEncuesta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdencuesta0()
    {
        return $this->hasOne(EncEncuesta::className(), ['id' => 'idencuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestaValores()
    {
        return $this->hasMany(EncEncuestaValores::className(), ['idencuesta' => 'id']);
    }
}
