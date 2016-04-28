<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encRango".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $visible
 *
 * @property EncCompetencia[] $encCompetencias
 * @property EncRangoValor[] $encRangoValors
 */
class Rango extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encRango';
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
            [['descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['visible'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'descripcion' => 'Descripción',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncCompetencias()
    {
        return $this->hasMany(EncCompetencia::className(), ['idRango' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncRangoValors()
    {
        return $this->hasMany(EncRangoValor::className(), ['idRango' => 'id']);
    }
}
