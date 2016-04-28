<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property integer $Id
 * @property string $Descripcion
 * @property integer $Visible
 * @property integer $Evaluado
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorias';
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
            [['Descripcion'], 'string'],
            [['Visible', 'Evaluado', 'Orden'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Descripcion' => 'Descripcion',
            'Visible' => 'Visible',
            'Evaluado' => 'Evaluado',
            'Orden' => 'Orden',
        ];
    }
}
