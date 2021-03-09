<?php

namespace app\controllers;

use Yii;
use app\models\ProgrammeExpert;
use app\models\ProgrammeExpertSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgrammeExpertController implements the CRUD actions for ProgrammeExpert model.
 */
class ProgrammeExpertController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProgrammeExpert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgrammeExpertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProgrammeExpert model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProgrammeExpert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProgrammeExpert();

         if ($model->load(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            
            $model->status_act = 9;
            $model->created_by = $session['user'];
            $model->created_at = 0;
            $model->updated_by = $session['user'];
            $model->updated_at = 0;
            
            if($model->save()){
                
                Yii::$app->session->setFlash('success', 'Programme Expert was successfully added.');
                
                return $this->redirect(['view', 'id' => $model->id]);
            }
             var_dump($model->getErrors());
            Yii::$app->session->setFlash('Error', 'Programme Expert was not successfully added.');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    
     public function actionAddexpert($id){
        $model = new ProgrammeExpert();
        $programme = \app\models\LearningProgramme::findOne(['id' => $id]);
        $session = Yii::$app->session;
         
        if($model->load(Yii::$app->request->post())){
            $model->status_act = 9;
            $model->created_by = $session['user'];
            $model->created_at = 0;
            $model->updated_by = $session['user'];
            $model->updated_at = 0;
            
            if($model->save()){
            if(!isset($programme->prog_expert2)){
                $programme->prog_expert2 = $model->id;
                if($programme->save()){
                    Yii::$app->session->setFlash('success', 'we have added expert 2');
                    return $this->redirect(['learning-progamme/view', 'id' => $id]);
                   
                }
                Yii::$app->session->setFlash('error', 'Programme not updated');
                var_dump($programme->getErrors());
            }else if(!isset($programme->prog_expert3)){
                $programme->prog_expert3 = $model->id;
                if($programme->save()){
                    Yii::$app->session->setFlash('success', 'we have added expert 3');
                    return $this->redirect(['learning-progamme/view', 'id' => $id]);
                    
                }
                Yii::$app->session->setFlash('error', 'Programme not updated');
               // var_dump($programme->getErrors());
                
            } else if(!isset($programme->prog_expert4)){
                $programme->prog_expert4 = $model->id;
               if($programme->save()){
                   Yii::$app->session->setFlash('success', 'we have added expert 4');
                    return $this->redirect(['learning-progamme/view', 'id' => $id]);
                }
                Yii::$app->session->setFlash('error', 'Programme not updated');
               // var_dump($programme->getErrors());
            }
           
            }
            Yii::$app->session->setFlash('error', 'Expert not updated');
        }
         return $this->render('addexpert', [
            'model' => $model,
             'id' => $id,
        ]);
    }
    
   

    /**
     * Updates an existing ProgrammeExpert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            
           
            $model->updated_by = $session['user'];
            
            if($model->save()){
                
                Yii::$app->session->setFlash('success', 'A programme expert was successfully added.');
                return $this->redirect(['view', 'id' => $model->id]);
                
            } else{
                Yii::$app->session->setFlash('error', 'Sorry. The programme expert was not successfully added.');
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProgrammeExpert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProgrammeExpert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProgrammeExpert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProgrammeExpert::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
