<?php

namespace app\controllers;

use Yii;
use app\models\ProgrammeExpert;
use app\models\LearningProgramme;
use app\models\LearningProgrammeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * LearningProgrammeController implements the CRUD actions for LearningProgramme model.
 */
class LearningProgrammeController extends Controller
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
     * Lists all LearningProgramme models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LearningProgrammeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
         $dataProvider->setSort([
            'attributes' =>
                [
                    'university' => [
                        'desc'    => ['university' => SORT_DESC],
                    ],
                ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    public function actionIndexbyuni($id){
        $searchModel = new LearningProgrammeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $dataProvider->query->andWhere('university = '. $id);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LearningProgramme model.
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
     * Creates a new LearningProgramme model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LearningProgramme();
        $expert = new ProgrammeExpert();

         if ($model->load(Yii::$app->request->post()) && $expert->load(Yii::$app->request->post())) {
            $session = Yii::$app->session;
             $expert->status_act = 9;
                $expert->id = 0;
                $expert->created_by = $session['user'];
                $expert->created_at = 0;
                $expert->updated_by = $session['user'];
                $expert->updated_at = 0;
   
            if($expert->save()){
             
                $model->id = 0;
                $model->created_by = $session['user'];
                $model->created_at = 0;
                $model->updated_by = $session['user'];
                $model->updated_at = 0;
                $model->prog_expert1 = $expert->id;
            
                if($model->save()){
                
                    Yii::$app->session->setFlash('success', 'Programme was successfully added.');
                    return $this->redirect(['view', 'id' => $model->id]);
                
                } else{
                    Yii::$app->session->setFlash('error', 'Sorry. Programme was not successfully added.');
                    print_r($model->getErrors());
                }
                
            }
            print_r($expert->getErrors());
        }

        return $this->render('create', [
            'model' => $model,
            'expert' => $expert,
        ]);
    }

    /**
     * Updates an existing LearningProgramme model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LearningProgramme model.
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
     * Finds the LearningProgramme model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LearningProgramme the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LearningProgramme::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
