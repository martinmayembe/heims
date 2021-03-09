<?php

namespace app\controllers;

use Yii;
use app\models\UniversityAddress;
use app\models\University;
use app\models\UniversitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UniversityController implements the CRUD actions for University model.
 */
class UniversityController extends Controller
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
     * Lists all University models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UniversitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->setSort([
            'attributes' =>
                [
                    'type' => [
                        'asc'     => ['type' => SORT_ASC],
                        'desc'    => ['type' => SORT_DESC],
                    ],
                ],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single University model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        return $this->render('view', [
            'address' => UniversityAddress::findOne(['id' => $this->findModel($id)->address]),
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new University model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new University();
        $address = new UniversityAddress();

        if ($model->load(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            
            $model->status_act = 9;
            $model->created_by = $session['user'];
            $model->created_at = 0;
            $model->updated_by = $session['user'];
            $model->updated_at = 0;
            $model->id = 0;
            
            if ($address->load(Yii::$app->request->post())) {
                $address->status_act = 9;
                $address->created_by = $session['user'];
                $address->created_at = 0;
                $address->updated_by = $session['user'];
                $address->updated_at = 0; 
                $address->id = 0;
                if($address->save()){
                    $model->address = $address->id;
                    if($model->save()){
                
                        Yii::$app->session->setFlash('success', 'University was successfully added.');
                        return $this->redirect(['view', 'id' => $model->id]);
                
                    } else{
                        Yii::$app->session->setFlash('error', 'Sorry. University was not successfully added.');
                        var_dump($model->getErrors());
                        return $this->goHome();
                    }
                }   
                 Yii::$app->session->setFlash('error', 'Sorry. The University address was not successfully added. Kindly contact the admin for assistance.');
                    var_dump($address->getErrors());
                
            }
        }
        
        return $this->render('create', [
            'model' => $model,
            'address' => $address,
        ]);
    }

    /**
     * Updates an existing University model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $address = UniversityAddress::findOne(['id' => $this->findModel($id)->address]);;

        if ($model->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post())) {
            $model->save;
            $address->save;
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'address' => $address,
        ]);
    }

    /**
     * Deletes an existing University model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        UniversityAddress::findOne(['id' => $this->findModel($id)->address])->delete();
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the University model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return University the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = University::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
