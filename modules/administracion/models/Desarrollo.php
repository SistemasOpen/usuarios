<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encDesarrollo".
 *
 * @property integer $id
 * @property integer $idCompetencia
 * @property integer $valor_desarrollo
 * @property integer $idCategoria_usuario
 * @property integer $visible
 *
 * @property EncCompetenciaDescripcion $idCompetencia0
 */
class Desarrollo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encDesarrollo';
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
            [['idCompetencia', 'valor_desarrollo', 'idCategoria_usuario', 'visible'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'idCompetencia' => 'Competencia',
            'valor_desarrollo' => 'Valor de desarrollo',
            'idCategoria_usuario' => 'Categoría',
            'visible' => 'Es visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompetencia0()
    {
        return $this->hasOne(Competenciadescripcion::className(), ['id' => 'idCompetencia']);
    }
    public function getCategoria0()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'idCategoria_usuario']);
    }
}
