<?php

namespace app\modules\administracion\models;

use Yii;
use app\modules\administracion\models\Rango;

/**
 * This is the model class for table "encTipoEncuesta".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $idRango
 * @property integer $esFuncional
 * @property integer $esAnonima
 * @property integer $visible
 *
 * @property EncEncuesta[] $encEncuestas
 */
class Tipoencuesta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encTipoEncuesta';
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
            [['descripcion', 'idRango'], 'required'],
            [['descripcion'], 'string'],
            [['idRango', 'esFuncional', 'esAnonima', 'visible'], 'integer']
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
            'idRango' => 'Rango de encuesta',
            'esFuncional' => 'Funcional',
            'esAnonima' => 'Anónima',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestas()
    {
        return $this->hasMany(EncEncuesta::className(), ['idTipoEncuesta' => 'id']);
    }
    public function getRango0()
    {
        return $this->hasOne(Rango::className(), ['id' => 'idRango']);
    }

}
