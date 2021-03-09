<?php


namespace app\controllers;


use app\models\User;
use Yii;
use yii\web\Controller;

class HomeController extends Controller
{
    /**
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {         
            return $this->render('index');
        }
    }
}