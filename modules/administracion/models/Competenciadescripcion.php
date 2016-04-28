<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encCompetenciaDescripcion".
 *
 * @property integer $id
 * @property string $Texto
 * @property integer $idTipoComp
 * @property integer $visible
 *
 * @property EncTipoCompetencia $idTipoComp0
 * @property EncDesarrollo[] $encDesarrollos
 */
class Competenciadescripcion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encCompetenciaDescripcion';
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
            [['Texto', 'idTipoComp'], 'required'],
            [['Texto'], 'string'],
            [['idTipoComp', 'visible'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Texto' => 'Texto',
            'idTipoComp' => 'Id Tipo Comp',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoComp0()
    {
        return $this->hasOne(Tipocompetencia::className(), ['id' => 'idTipoComp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncDesarrollos()
    {
        return $this->hasMany(Desarrollo::className(), ['idCompetencia' => 'id']);
    }
}
