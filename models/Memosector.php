<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "memosector".
 *
 * @property integer $memo
 * @property integer $sector
 */
class Memosector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memosector';
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
            [['memo', 'sector'], 'required'],
            [['memo', 'sector'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'memo' => 'Memo',
            'sector' => 'Sector',
        ];
    }
}
