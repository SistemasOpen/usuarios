<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property GrupoModulo[] $grupoModulos
 * @property GruposModulos[] $gruposModulos
 * @property UsuarioGrupo[] $usuarioGrupos
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo';
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
            [['nombre'], 'string']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoModulos()
    {
        return $this->hasMany(GrupoModulo::className(), ['grupo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGruposModulos()
    {
        return $this->hasMany(GruposModulos::className(), ['grupo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioGrupos()
    {
        return $this->hasMany(UsuarioGrupo::className(), ['grupo' => 'id']);
    }
}
