<?php

namespace app\models;

use Yii;
use app\models\Empresas;

/**
 * This is the model class for table "Depositos".
 *
 * @property integer $id
 * @property integer $codigo
 * @property integer $empresa
 * @property string $nombre
 * @property string $domicilio
 * @property string $localidad
 * @property string $telefono
 * @property string $celular
 * @property integer $tienesectores
 * @property string $horario
 * @property string $encargado
 * @property string $correo
 * @property string $correoencargado
 * @property string $perfil
 * @property integer $cerrado
 * @property integer $tipodeposito
 * @property string $observaciones
 */
class Depositos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Depositos';
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
            [['codigo', 'empresa', 'tienesectores', 'cerrado', 'tipodeposito'], 'integer'],
            [['nombre', 'domicilio', 'localidad', 'telefono', 'celular', 'horario', 'encargado', 'correo', 'correoencargado', 'perfil', 'observaciones', 'codigopostal'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Sucursal' => 'Codigo',
            'Empresa' => 'Empresa',
            'Nombre' => 'Nombre',
            'Domicilio' => 'Domicilio',
            'Localidad' => 'Localidad',
            'Teléfono' => 'Telefono',
            'Celular' => 'Celular',
            'Tienesectores' => 'Tienesectores',
            'Horario' => 'Horario',
            'Encargado' => 'Encargado',
            'Correo del local' => 'Correo',
            'Correo del encargado' => 'Correoencargado',
            'Perfil' => 'Perfil',
            'Cerrado' => 'Cerrado',
            'Tipo deposito' => 'Tipodeposito',
            'Observaciones' => 'Observaciones',
            'codigopostal' => 'Código postal',
        ];
    }
    
    public function getEmpresa0()
    {
        return $this->hasOne(Empresas::className(), ['codigo' => 'empresa']);
    }

}
