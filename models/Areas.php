<?php

namespace app\models;
use Yii;
use app\models\Sectores;

/**
 * This is the model class for table "areas".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $sector
 * @property string $direccion
 * @property string $telefono
 * @property string $mail
 * @property string $encargado
 * @property string $horario
 * @property string $observaciones
 * @property integer $visible
 *
 * @property Usuario[] $usuarios
 */
class Areas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'areas';
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
            [['sector', 'visible', 'jefe', 'departamento', 'gerencia'], 'integer']
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
            'Sector' => 'Sector',
            'Domicilio' => 'Direccion',
            'Teléfono' => 'Telefono',
            'E-mail' => 'Mail',
            'Encargado' => 'Encargado',
            'Horario' => 'Horario',
            'Observaciones' => 'Observaciones',
            'Visible' => 'Visible',
            'jefe'=>'Jefe',
            'departamento'=>'Departamento',
            'gerencia'=>'Gerencia',
        ];
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['area' => 'id']);
    }

    public function getGerencia0()
    {
        return $this->hasOne(Gerencias::className(), ['id' => 'gerencia']);
    }

    public function getSector0()
    {
        return $this->hasOne(Sectores::className(), ['id' => 'sector']);
    }

    public function getDepartamento0()
    {
        return $this->hasOne(Departamentos::className(), ['id' => 'departamento']);
    }

    public function getUsuario0()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'jefe']);
    }


}
