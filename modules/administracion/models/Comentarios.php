<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encComentarios".
 *
 * @property integer $id
 * @property integer $idencuesta
 * @property integer $idconsigna
 * @property string $detalle
 * @property integer $orden
 *
 * @property EncConsignas $idconsigna0
 * @property EncEncuestaResultado $idencuesta0
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encComentarios';
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
            [['idencuesta', 'idconsigna', 'orden'], 'integer'],
            [['detalle'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idencuesta' => 'Idencuesta',
            'idconsigna' => 'Idconsigna',
            'detalle' => 'Detalle',
            'orden' => 'Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdconsigna0()
    {
        return $this->hasOne(EncConsignas::className(), ['id' => 'idconsigna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdencuesta0()
    {
        return $this->hasOne(EncEncuestaResultado::className(), ['id' => 'idencuesta']);
    }
}
