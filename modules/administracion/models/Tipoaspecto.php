<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encTipoAspecto".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $orden
 *
 * @property EncEncuestaAspecto[] $encEncuestaAspectos
 */
class Tipoaspecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encTipoAspecto';
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
            [['orden'], 'integer']
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
            'orden' => 'Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestaaspectos()
    {
        return $this->hasMany(EncEncuestaAspecto::className(), ['idtipoaspecto' => 'id']);
    }
}
