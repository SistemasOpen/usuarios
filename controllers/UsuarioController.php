<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;

use app\models\Usuario;
use app\models\User;
use app\models\UsuarioSearch;
use app\models\Gerencias;
use app\models\Sectores;
use app\models\Departamentos;
use app\models\Areas;
use app\models\Categorias;
use app\models\Funciones;
use app\models\Imageupload;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
  public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','login','listarcumple'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','listarcumple'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model      = new Usuario();
        $imageModel = new Imageupload();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){

                $model->save();

                $imageModel->image = UploadedFile::getInstance($imageModel,'image');
           
                $imageModel->image->saveAs('uploads/'.$model->legajo.'_'.$model->empresa. $imageModel->image->extension);

                $imageModel->upload();
                // file is uploaded successfully
                //$model->imageFile = 'dgfg';
        
            
            return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model'         =>  $model,
                    'imageModel'    =>  $imageModel,
                ]);
            }
        } else {
            return $this->render('create', [
                'model'         =>  $model,
                'imageModel'    =>  $imageModel,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUploads()
    {
        $model = new Imageupload;
        $model->image = UploadedFile::getInstances($model, 'image');
        if ($model->upload()) {
            return 100;
        }
        return 0;
    } 
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $imageModel = new Imageupload();
       
        if ($model->load(Yii::$app->request->post())) {

            if($model->validate()){
                $model->save();
                $imageModel->image = UploadedFile::getInstance($imageModel,'image');
                $imageModel->upload();
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('update', [
                    'model'         =>  $model,
                    'imageModel'    =>  $imageModel,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'imageModel'    =>  $imageModel,
            ]);
        }
    }
    
    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionImportarusu()
    {
           Yii::$app->get('dbIntranet')->createCommand('SET QUOTED_IDENTIFIER ON; SET ANSI_WARNINGS ON')->execute();        
           $resultado = Yii::$app->get('dbIntranet')->createCommand('pa_usr_importarlegajos')->queryOne();
           $nimport=$resultado['importados'];
           if ( $nimport>0)
           Yii::$app->session->setFlash('success','Se importaron ' .  $nimport . ' registros');  
            else
            Yii::$app->session->setFlash('success','Ya fueron importados todos los usuarios.');  
           return $this->redirect(['usuario/index']);           
    }

    public function actionListarcumple()
    {
       $resultado = Yii::$app->get('dbIntranet')->createCommand('pa_usr_ListarCumple')->queryAll();

       $dataProvider = new ArrayDataProvider([
                'key'=>'legajo',
                'allModels' => $resultado,
                'sort' => [
                    'attributes' => ['legajo'],
                ],
                'pagination' => [
                    'pageSize' => 20,
                ],
        ]);
        return $this->render('listarcumple', [
            'dataProvider' => $dataProvider,
        ]);     
    }


    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGerencias($id){
        
        echo json_encode(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }
    public function actionGerenciasporid($id){
        
        echo json_encode(ArrayHelper::map(Gerencias::find()->Where(['id'=>$id])->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionSectores($id){
        
        echo json_encode(ArrayHelper::map(Sectores::find()->Where(['idgerencia'=>$id])->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionSectorestodos($id){
        
        echo json_encode(ArrayHelper::map(Sectores::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionDepartamentos($id){
        
        echo json_encode(ArrayHelper::map(Departamentos::find()->Where(['idgerencia'=>$id])->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionDepartamentostodos($id){
        
        echo json_encode(ArrayHelper::map(Departamentos::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }
    public function actionAreastodas($id){
        
        echo json_encode(ArrayHelper::map(Areas::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionAreas($id){
        
        echo json_encode(ArrayHelper::map(Areas::find()->Where(['sector'=>$id])->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionCategorias($id){
        
        echo json_encode(ArrayHelper::map(Categorias::find()->all(), 'Id', 'Descripcion'));
        //echo json_decode($DPartList->models);
    }

    public function actionFunciones($id){
        
        echo json_encode(ArrayHelper::map(Funciones::find()->all(), 'id', 'descripcion'));
        //echo json_decode($DPartList->models);
    }

    public function actionPuestos($id){
        
        echo json_encode(ArrayHelper::map(Puestos::find()->all(), 'id', 'descripcion'));
        //echo json_decode($DPartList->models);
    }

    public function actionIngreso()
    {
        $model      = new Usuario();      
        if ($model->load(Yii::$app->request->post())) {

            $sql = "pa_usr_buscarusuarioypass " . $model->empresa . ", " . $model->legajo . ", '" . $model->password. "'";
            $resultado = Yii::$app->get('dbIntranet')->createCommand($sql)->queryAll();

            if ($resultado){
                $dataProvider = new ArrayDataProvider([
                        'allModels' => $resultado,
                        'pagination' => [
                            'pageSize' => 0,
                        ],
                ]);
                return $this->render('/site/bienvenido', [
               'dataProvider' => $dataProvider
            ]);
            }
        Yii::$app->session->setFlash('danger','Los datos ingresados son incorrectos');  
            
        }
       

       return $this->render('/site/login', [
           'model' => $model
        ]);
    }

   
    public function actionAgregahashes()
    {
        $users = User::find()->where('id < 800')->all();

        foreach ($users AS $user){
            print_r($user->legajo);
            $user->setPassword($user->password);
            $user->generateAuthKey();
            $user->save();
        }
        
    }

    public function actionMostrarlegajos()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->buscaradm(Yii::$app->request->queryParams);
        return $this->render('modlegajos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCompletardatos($id)
    {
        $model = $this->findModel($id);
        $imageModel = new Imageupload();
       
        if ($model->load(Yii::$app->request->post())) {

            if($model->validate()){
                $model->save();
                $imageModel->image = UploadedFile::getInstance($imageModel,'image');
                $imageModel->upload();
                return $this->redirect(['mostrarlegajos']);
            }else{
                return $this->render('completardatos', [
                    'model'         =>  $model,
                    'imageModel'    =>  $imageModel,
                ]);
            }
        } else {
            return $this->render('completardatos', [
                'model' => $model,
                'imageModel'    =>  $imageModel,
            ]);
        }
    }

    public function actionAsignarlegajosucursal()
    {

        if (Yii::$app->request->get('id')) {
            $sucursal=Yii::$app->request->get('id');
        }
        else
        {
            $sucursal = 1;
        }

        $searchModel = new UsuarioSearch();
        $modelUsuario = Usuario::find()->where('activo = 1 and gerencia = 7 and empresa <> 2')->orderby('nombre')->all();

        $DPusuario =  new ArrayDataProvider([
                'allModels' => $modelUsuario,
                'pagination' => [
                    'pageSize' => 40,
                ],
        ]);

            $dataProvider = $searchModel->buscarlocal(Yii::$app->request->queryParams);
            return $this->render('asignarlegajosucursal', [
                'model' => $searchModel,
                'dataProvider' => $dataProvider,
                'DPusuario' => $DPusuario
            ]);
    }

    public function actionBuscarsucursal()
    {

        if (Yii::$app->request->get('id')) {
            $sucursal=Yii::$app->request->get('id');
        }
        else
        {
            $sucursal = 1;
        }
        //print_r(Yii::$app->request->get());exit;
        $array= [];
//        $arrusrs=Usuario::find()->where('activo = 1 and gerencia = 7 and empresa <> 2')->orderby('nombre')->all();
        $arrusrs=Usuario::find()->where('sucursal = ' . $sucursal)->orderby('nombre')->all();
        foreach ($arrusrs AS $usr)
        {
            $array[]=['nombre'=>utf8_encode($usr['nombre']),'id'=>$usr['id']];            
        }
        return json_encode($array);        
    }

    public function actionMostrarlegajosucursal()
    {
        $model      = new Usuario();      
        if (Yii::$app->request->get('id')) {
            $iddeposito = Yii::$app->request->get('id');
        }
        else
        {
            $iddeposito = 1;            
        }

            $sql = "pa_usu_muestrasucursal " . $iddeposito;
//            $sql = "pa_usu_muestrasucursal " . Yii::$app->request->get('id');
            $resultado = Yii::$app->get('dbIntranet')->createCommand($sql)->queryAll();

            if ($resultado){
                $dataProvider = new ArrayDataProvider([
                        'allModels' => $resultado,
                        'pagination' => [
                            'pageSize' => 40,
                        ],
                ]);
                if (Yii::$app->request->isAjax){
                    $data = $this->renderAjax('asignarlegajosucursal', [
                        'dataProvider' => $dataProvider,
                        'model' =>$model 
                    ]);
                return json_encode($data);
                }

              return $this->render('asignarlegajosucursal', [
                'dataProvider' => $dataProvider,
                'model' =>$model 
                ]);

            }
        //}
    }


}
