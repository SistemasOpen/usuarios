<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encConsignas".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $idtipoencuesta
 *
 * @property EncComentarios[] $encComentarios
 * @property EncTipoEncuesta $idtipoencuesta0
 */
class Consignas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encConsignas';
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
            [['descripcion'], 'string'],
            [['idtipoencuesta'], 'integer']
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
            'idtipoencuesta' => 'Tipo de encuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncComentarios()
    {
        return $this->hasMany(EncComentarios::className(), ['idconsigna' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtipoencuesta0()
    {
        return $this->hasOne(EncTipoEncuesta::className(), ['id' => 'idtipoencuesta']);
    }
}
