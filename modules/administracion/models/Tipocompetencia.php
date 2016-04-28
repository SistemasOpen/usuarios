<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encTipoCompetencia".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $visible
 *
 * @property EncCompetenciaDescripcion[] $encCompetenciaDescripcions
 */
class Tipocompetencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encTipoCompetencia';
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
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncCompetenciaDescripcions()
    {
        return $this->hasMany(EncCompetenciaDescripcion::className(), ['idTipoComp' => 'id']);
    }
}
