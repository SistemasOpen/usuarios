<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "departamentos".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $idgerencia
 * @property integer $tieneareas
 * @property string $direccion
 * @property string $telefono
 * @property string $mail
 * @property string $encargado
 * @property string $horario
 * @property string $observaciones
 * @property integer $visible
 * @property integer $jefe
 */
class Departamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamentos';
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
            [['nombre', 'direccion', 'telefono', 'mail', 'encargado', 'horario', 'observaciones'], 'string'],
            [['idgerencia', 'tieneareas', 'visible', 'jefe'], 'integer']
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
            'idgerencia' => 'Idgerencia',
            'tieneareas' => 'Tieneareas',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'mail' => 'Mail',
            'encargado' => 'Encargado',
            'horario' => 'Horario',
            'observaciones' => 'Observaciones',
            'visible' => 'Visible',
            'jefe' => 'Jefe',
        ];
    }
}
