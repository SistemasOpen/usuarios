<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gerencias".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $jefe
 * @property string $mail
 * @property integer $visible
 *
 * @property Usuario[] $usuarios
 */
class Gerencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gerencias';
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
            [['nombre', 'mail'], 'string'],
            [['jefe', 'visible'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'jefe' => 'Jefe',
            'mail' => 'Mail',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['gerencia' => 'id']);
    }
}
