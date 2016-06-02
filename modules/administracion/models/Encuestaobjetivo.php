<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encEncuestaObjetivo".
 *
 * @property integer $id
 * @property integer $idencuesta
 * @property integer $nivel
 * @property string $texto
 * @property integer $recondacion
 *
 * @property EncEncuestaPublica $idencuesta0
 */
class Encuestaobjetivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEncuestaObjetivo';
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
            [['idencuesta', 'nivel', 'texto', 'recomendacion'], 'required'],
            [['idencuesta', 'nivel', 'recomendacion'], 'integer'],
            [['texto'], 'string']
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
            'nivel' => 'Nivel',
            'texto' => 'Texto',
            'recondacion' => 'Recomendacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdencuesta0()
    {
        return $this->hasOne(EncEncuestaPublica::className(), ['id' => 'idencuesta']);
    }
}
