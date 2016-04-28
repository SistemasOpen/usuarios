<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encTipomovimiento".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property EncRegistro[] $encRegistros
 */
class Tipomovimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encTipomovimiento';
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
            [['descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncRegistros()
    {
        return $this->hasMany(EncRegistro::className(), ['tipomovimiento' => 'id']);
    }
}
