<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encEncuestaValores".
 *
 * @property integer $id
 * @property integer $idencuesta
 * @property integer $idtipocompetencia
 * @property string $individual
 * @property string $general
 * @property string $ponderacion
 * @property string $total
 *
 * @property EncEncuestaPublica $idencuesta0
 */
class Encuestavalores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEncuestaValores';
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
            [['idencuesta', 'idtipocompetencia'], 'integer'],
            [['individual', 'general', 'ponderacion', 'total'], 'number']
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
            'idtipocompetencia' => 'Idtipocompetencia',
            'individual' => 'Individual',
            'general' => 'General',
            'ponderacion' => 'Ponderacion',
            'total' => 'Total',
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
