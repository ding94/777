<?php

namespace app\controllers;

use Yii;
use yii\web\controller;
use app\controllers\RandomController;
use app\controllers\RewardController;
use app\models\Chance;

class ChanceController extends Controller
{
    public function actionIndex(){

        if(Yii::$app->user->getIsGuest())
        {
            Yii::$app->session->setFlash('info' , 'Please Login in');
            return $this->redirect(['/site/login']);
        }

        /*
         * find wheter chance database create
         * if not create one
         */
        $today =  date('Y-m-d 00:00:00');
        $tommorow = date('Y-m-d 00:00:00', strtotime(' +1 day'));
        $chance = Chance::find()->where('userid = :id' ,[':id' => Yii::$app->user->identity->id])->andWhere(['between','updatetime',$today ,$tommorow])->one();

        if(empty($chance))
        {
            $chance = new Chance;
            $chance->chance = 1;
            $chance->userid = Yii::$app->user->identity->id;
            $chance->createtime = date('Y-m-d G:i:s');
            $chance->save();
        }

        RewardController::emptyReward();
        $model = RandomController::randomNumGen($chance);

       if(Yii::$app->request->isAjax){
          RewardController::submitReward($model[1],$chance,$today,$tommorow);
       }
        return $this->render('index' ,['model' =>$model]);
    }
}
