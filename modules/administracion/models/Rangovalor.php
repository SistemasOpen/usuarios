<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encRangoValor".
 *
 * @property integer $id
 * @property integer $idRango
 * @property integer $valor
 * @property string $descripcion
 * @property integer $visible
 *
 * @property EncRango $idRango0
 */
class Rangovalor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encRangoValor';
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
            [['idRango', 'valor', 'descripcion'], 'required'],
            [['idRango', 'valor', 'visible'], 'integer'],
            [['descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'idRango' => 'Rango',
            'valor' => 'Valor',
            'descripcion' => 'Descripción',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRango0()
    {
        return $this->hasOne(Rango::className(), ['id' => 'idRango']);
    }
    public function getRango0()
    {
        return $this->hasOne(Rango::className(), ['id' => 'idRango']);
    }

}
