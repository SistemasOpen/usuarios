<?php

namespace app\controllers;

use Yii;
use app\models\Plantillas;
use app\models\PlantillasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
use app\models\Pdfplantillaupload;
use yii\web\UploadedFile;


use app\models\Gerencias;
use app\models\Sectores;
use app\models\Areas;

/**
 * PlantillasController implements the CRUD actions for Plantillas model.
 */
class PlantillasController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Plantillas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlantillasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plantillas model.
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
     * Creates a new Plantillas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plantillas();
        $imageModel = new Pdfplantillaupload();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){

            $model->save();
            
            $imageModel->image = UploadedFile::getInstance($imageModel,'image');

            $imageModel->image->saveAs('plantillas/p' . $model->id .  '.' . $imageModel->image->extension);

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
     * Updates an existing Plantillas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $imageModel = new Pdfplantillaupload();

        if ($model->load(Yii::$app->request->post())) {

            if($model->validate()){
                $model->save();
                $imageModel->image = UploadedFile::getInstance($imageModel,'image');

                $imageModel->image->saveAs('plantillas/p' . $model->id .  '.' . $imageModel->image->extension);

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
     * Deletes an existing Plantillas model.
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
     * Finds the Plantillas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plantillas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plantillas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGerencias($id){
        
        echo json_encode(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionSectores($id){
        
        echo json_encode(ArrayHelper::map(Sectores::find()->Where(['idgerencia'=>$id])->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionAreas($id){
        
        echo json_encode(ArrayHelper::map(Areas::find()->Where(['sector'=>$id])->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }
    public function actionSectorestodos($id){
        
        echo json_encode(ArrayHelper::map(Sectores::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }
    public function actionAreastodas($id){
        
        echo json_encode(ArrayHelper::map(Areas::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionUploads()
    {
        $model = new Pdfplantillaupload;
        $model->image = UploadedFile::getInstances($model, 'image');
        if ($model->upload()) {
            return 100;
        }
        return 0;
    } 


}
