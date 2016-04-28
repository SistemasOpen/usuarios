<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encRegistro".
 *
 * @property integer $id
 * @property integer $usuario
 * @property string $fecha
 * @property integer $tipomovimiento
 * @property string $observaciones
 * @property integer $encuesta
 *
 * @property EncEncuesta $encuesta0
 * @property EncTipomovimiento $tipomovimiento0
 */
class Registro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encRegistro';
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
            [['usuario', 'tipomovimiento', 'encuesta'], 'integer'],
            [['fecha'], 'safe'],
            [['observaciones'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'fecha' => 'Fecha',
            'tipomovimiento' => 'Tipomovimiento',
            'observaciones' => 'Observaciones',
            'encuesta' => 'Encuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuesta0()
    {
        return $this->hasOne(Encuesta::className(), ['id' => 'encuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipomovimiento0()
    {
        return $this->hasOne(Tipomovimiento::className(), ['id' => 'tipomovimiento']);
    }
}
