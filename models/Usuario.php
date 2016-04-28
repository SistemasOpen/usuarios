<?php

namespace app\models;

use Yii;
use app\models\Empresas;
use app\models\Gerencias;
use app\models\Sectores;
use app\models\Areas;
use app\models\Puestos;
use app\models\Categorias;
use yii\helpers\Url;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property integer $legajo
 * @property integer $empresa
 * @property integer $gerencia
 * @property integer $sector
 * @property integer $area
 * @property integer $categoria
 * @property string $nombre
 * @property string $username
 * @property string $webpass
 * @property string $password
 * @property integer $admin
 * @property integer $cambiapass
 * @property string $ultimoacceso
 * @property integer $documento
 * @property integer $activo
 * @property string $fechamodificacion
 *
 * @property EncEvaluadoEvaluador[] $encEvaluadoEvaluadors
 * @property EncEvaluadoEvaluador[] $encEvaluadoEvaluadors0
 * @property Gerencias $gerencia0
 * @property Sectores $sector0
 * @property Areas $area0
 * @property Empresas $empresa0
 * @property UsuarioGrupo[] $usuarioGrupos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
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
            [['legajo', 'sexo'], 'required'],
            [['legajo', 'empresa', 'gerencia', 'sector', 'area', 'categoria', 'admin', 'cambiapass', 
                'documento', 'activo', 'puesto', 'sexo', 'sucursal', 'departamento',], 'integer'],
            [['nombre', 'username', 'webpass', 'password'], 'string'],
            [['ultimoacceso', 'fechamodificacion', 'fechanacimiento'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'legajo' => 'Legajo',
            'empresa' => 'Empresa',
            'gerencia' => 'Gerencia',
            'sector' => 'Sector',
            'area' => 'Area',
            'categoria' => 'Categoria',
            'nombre' => 'Nombre',
            'username' => 'Username',
            'webpass' => 'Webpass',
            'password' => 'Password',
            'admin' => 'Es administrador',
            'cambiapass' => 'Cambia password',
            'ultimoacceso' => 'Ultimo acceso',
            'documento' => 'Documento',
            'activo' => 'Activo',
            'fechamodificacion' => 'Fecha de modificación',
            'fechanacimiento' => 'Fecha de nacimiento', 
            'puesto' => 'Puesto',
            'sexo' => 'Sexo',
            'sucursal' => 'Sucursal',
            'departamento' => 'Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEvaluadoEvaluadors()
    {
        return $this->hasMany(EncEvaluadoEvaluador::className(), ['evaluado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncEvaluadoEvaluadors0()
    {
        return $this->hasMany(EncEvaluadoEvaluador::className(), ['evaluador' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGerencia0()
    {
        return $this->hasOne(Gerencias::className(), ['id' => 'gerencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector0()
    {
        return $this->hasOne(Sectores::className(), ['id' => 'sector']);
    }

    public function getDepartamento0()
    {
        return $this->hasOne(Departamentos::className(), ['id' => 'departamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea0()
    {
        return $this->hasOne(Areas::className(), ['id' => 'area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa0()
    {
        return $this->hasOne(Empresas::className(), ['codigo' => 'empresa']);
    }

    public function getCategoria0()
    {
        return $this->hasOne(Categorias::className(), ['Id' => 'categoria']);
    }

    public function getFuncion0()
    {
        return $this->hasOne(Funciones::className(), ['id' => 'funcion']);
    }

    public function getPuesto0()
    {
        return $this->hasOne(Puestos::className(), ['id' => 'puesto']);
    }

    public function getDeposito0()
    {
        return $this->hasOne(Depositos::className(), ['codigo' => 'sucursal', 'empresa' => 'empresa']);
    }

    public function getUsuario0()
    {

        if ($this->area == 13)
        {
            $jefes = Sectores::find()->where(['id' => $this->sector])->one();
            return Usuario::find()->where(['id' => $jefes['jefe']])->one();
        }
        else
        {

            $jefes = Areas::find()->where(['id' => $this->area])->one();
            return Usuario::find()->where(['id' => $jefes['jefe']])->one();          
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioGrupos()
    {
        return $this->hasMany(UsuarioGrupo::className(), ['usuario' => 'id']);
    }
}
