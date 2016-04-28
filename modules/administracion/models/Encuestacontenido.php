<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encEncuestaContenido".
 *
 * @property integer $idEncuesta
 * @property integer $idCompetencia
 * @property integer $tipocompetencia
 *
 * @property EncEncuesta $idEncuesta0
 */
class Encuestacontenido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEncuestaContenido';
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
            [['idEncuesta', 'idCompetencia'], 'required'],
            [['idEncuesta', 'idCompetencia', 'tipocompetencia'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEncuesta' => 'Encuesta',
            'idCompetencia' => 'Competencia',
            'tipocompetencia' => 'Tipo de competencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEncuesta0()
    {
        return $this->hasOne(Encuesta::className(), ['id' => 'idEncuesta']);
    }
    public function getCompetencia0()
    {
        $model = Competenciadescripcion::find()->where(['id'=>$this->idCompetencia])->One();
        $model->Texto=utf8_encode($model->Texto);
        return $model;
    }
    public function getTipocompetencia0()
    {
        return $this->hasOne(Tipocompetencia::className(), ['id' => 'tipocompetencia']);
    }
}
