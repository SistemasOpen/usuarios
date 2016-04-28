<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encEncuestaDetalle".
 *
 * @property integer $id
 * @property integer $idEncuestaCab
 * @property integer $idCompetencia
 * @property integer $seleccion
 *
 * @property EncEncuestaResultado $idEncuestaCab0
 */
class Encuestadetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEncuestaDetalle';
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
            [['idEncuestaCab', 'idCompetencia'], 'required'],
            [['idEncuestaCab', 'idCompetencia', 'seleccion'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idEncuestaCab' => 'Id Encuesta Cab',
            'idCompetencia' => 'Id Competencia',
            'seleccion' => 'Seleccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEncuestaCab0()
    {
        return $this->hasOne(EncEncuestaResultado::className(), ['id' => 'idEncuestaCab']);
    }
}
