<?php

namespace app\modules\administracion\models;

use Yii;
use app\models\Usuario;

/**
 * This is the model class for table "encEvaluadoevaluador".
 *
 * @property integer $id
 * @property integer $encuesta
 * @property integer $evaluado
 * @property integer $evaluador
 * @property integer $visible
 *
 * @property Usuario $evaluado0
 * @property Usuario $evaluador0
 */
class Evaluadoevaluador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encEvaluadoEvaluador';
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
            [['encuesta', 'evaluado', 'evaluador', 'visible'], 'integer'],
            [['evaluado', 'evaluador'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'encuesta' => 'Encuesta',
            'evaluado' => 'Evaluado',
            'evaluador' => 'Evaluador',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluado0()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'evaluado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluador0()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'evaluador']);
    }
    public function getEncuesta0()
    {
        return $this->hasOne(Encuesta::className(), ['id' => 'encuesta']);
    }

}
