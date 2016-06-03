<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encEncuestaAspecto".
 *
 * @property integer $id
 * @property integer $idencuesta
 * @property integer $idtipoaspecto
 * @property string $texto
 *
 * @property EncEncuestaPublica $idencuesta0
 * @property EncTipoAspecto $idtipoaspecto0
 */
class Encuestaaspecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEncuestaAspecto';
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
            [['idencuesta', 'idtipoaspecto', 'texto'], 'required'],
            [['idencuesta', 'idtipoaspecto'], 'integer'],
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
            'idencuesta' => 'Idencuesta',
            'idtipoaspecto' => 'Idtipoaspecto',
            'texto' => 'Texto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdencuesta0()
    {
        return $this->hasOne(Encuestapublica::className(), ['id' => 'idencuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtipoaspecto0()
    {
        return $this->hasOne(Tipoaspecto::className(), ['id' => 'idtipoaspecto']);
    }
}
