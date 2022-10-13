<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
class LanguageController extends Controller {

    public function actionChange($lang){
        if(isset($lang) && $lang !== null){
            \Yii::$app->session->set('language', $lang);
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

}