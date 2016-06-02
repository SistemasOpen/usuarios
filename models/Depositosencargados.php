<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "depositos_encargados".
 *
 * @property integer $id
 * @property integer $iddeposito
 * @property integer $idencargado
 *
 * @property Depositos $iddeposito0
 * @property Usuario $idencargado0
 */
class Depositosencargados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'depositos_encargados';
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
            [['id'], 'required'],
            [['id', 'iddeposito', 'idencargado'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iddeposito' => 'Iddeposito',
            'idencargado' => 'Idencargado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddeposito0()
    {
        return $this->hasOne(Depositos::className(), ['id' => 'iddeposito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdencargado0()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'idencargado']);
    }
}
