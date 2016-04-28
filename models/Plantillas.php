<?php

namespace app\models;

use Yii;
use app\models\Gerencias;
use app\models\Sectores;
use app\models\Areas;


/**
 * This is the model class for table "plantillas".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $tipoarchivo
 * @property integer $gerencia
 * @property integer $sector
 * @property integer $area
 */
class Plantillas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plantillas';
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
            [['nombre', 'descripcion', 'tipoarchivo'], 'string'],
            [['gerencia', 'sector', 'area'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Código' => 'ID',
            'Descripción' => 'Nombre',
            'Detalle' => 'Descripcion',
            'Tipo de archivo' => 'Tipoarchivo',
            'Gerencia' => 'Gerencia',
            'Sector' => 'Sector',
            'Area' => 'Area',
        ];
    }

    public function getGerencia0()
    {
        return $this->hasOne(Gerencias::className(), ['id' => 'gerencia']);
    }
    public function getSector0()
    {
        return $this->hasOne(Sectores::className(), ['id' => 'sector']);
    }
    public function getArea0()
    {
        return $this->hasOne(Areas::className(), ['id' => 'area']);
    }

}
