<?php

namespace app\modules\administracion\models;

use Yii;

/**
 * This is the model class for table "encEncuestaResultado".
 *
 * @property integer $id
 * @property integer $idEncuesta
 * @property integer $idEvaluado
 * @property integer $idEvaluador
 * @property string $fecha
 * @property string $nivelCompOrganizacionalGral
 * @property string $nivelCompFuncionalGral
 * @property string $pondOrganizacionalGral
 * @property string $pondFuncionalGral
 * @property string $totalOrganizacionalGral
 * @property string $totalFuncionalGral
 * @property string $nivelCompOrganizacionalInd
 * @property string $nivelCompFuncionalInd
 * @property string $pondOrganizacionalInd
 * @property string $pondFuncionalInd
 * @property string $totalOrganizacionalInd
 * @property string $totalFuncionalInd
 *
 * @property EncComentarios[] $encComentarios
 * @property EncEncuestaAspecto[] $encEncuestaAspectos
 * @property EncEncuestaDetalle[] $encEncuestaDetalles
 * @property EncEncuesta $idEncuesta0
 * @property EncObjetivo[] $encObjetivos
 */
class Encuestaresultado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEncuestaResultado';
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
            [['idEncuesta', 'idEvaluado', 'idEvaluador'], 'integer'],
            [['fecha'], 'safe'],
            [['nivelCompOrganizacionalGral', 'nivelCompFuncionalGral', 'pondOrganizacionalGral', 'pondFuncionalGral', 'totalOrganizacionalGral', 'totalFuncionalGral', 'nivelCompOrganizacionalInd', 'nivelCompFuncionalInd', 'pondOrganizacionalInd', 'pondFuncionalInd', 'totalOrganizacionalInd', 'totalFuncionalInd'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idEncuesta' => 'Id Encuesta',
            'idEvaluado' => 'Id Evaluado',
            'idEvaluador' => 'Id Evaluador',
            'fecha' => 'Fecha',
            'nivelCompOrganizacionalGral' => 'Nivel Comp Organizacional Gral',
            'nivelCompFuncionalGral' => 'Nivel Comp Funcional Gral',
            'pondOrganizacionalGral' => 'Pond Organizacional Gral',
            'pondFuncionalGral' => 'Pond Funcional Gral',
            'totalOrganizacionalGral' => 'Total Organizacional Gral',
            'totalFuncionalGral' => 'Total Funcional Gral',
            'nivelCompOrganizacionalInd' => 'Nivel Comp Organizacional Ind',
            'nivelCompFuncionalInd' => 'Nivel Comp Funcional Ind',
            'pondOrganizacionalInd' => 'Pond Organizacional Ind',
            'pondFuncionalInd' => 'Pond Funcional Ind',
            'totalOrganizacionalInd' => 'Total Organizacional Ind',
            'totalFuncionalInd' => 'Total Funcional Ind',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncComentarios()
    {
        return $this->hasMany(EncComentarios::className(), ['idencuesta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestaAspectos()
    {
        return $this->hasMany(EncEncuestaAspecto::className(), ['idEncuestaCab' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEncuestaDetalles()
    {
        return $this->hasMany(EncEncuestaDetalle::className(), ['idEncuestaCab' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEncuesta0()
    {
        return $this->hasOne(EncEncuesta::className(), ['id' => 'idEncuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncObjetivos()
    {
        return $this->hasMany(EncObjetivo::className(), ['idEncuestaCab' => 'id']);
    }
}
