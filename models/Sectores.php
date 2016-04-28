<?php

namespace app\models;


use Yii;
use app\models\Gerencias;
use app\models\Usuario;

/**
 * This is the model class for table "sectores".
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
 *
 * @property Usuario[] $usuarios
 */
class Sectores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sectores';
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
            'id' => 'Código',
            'nombre' => 'Sector',
            'idgerencia' => 'Gerencia',
            'tieneareas' => 'Tiene areas',
            'direccion' => 'Domicilio',
            'telefono' => 'Teléfono',
            'mail' => 'E-Mail',
            'encargado' => 'Encargado',
            'horario' => 'Horario',
            'observaciones' => 'Observaciones',
            'visible' => 'Visible',
            'jefe' => 'Jefe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['sector' => 'id']);
    }
    public function getGerencia0()
    {
        return $this->hasOne(Gerencias::className(), ['id' => 'idgerencia']);
    }

    public function getUsuario0()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'jefe']);
    }
    

}
