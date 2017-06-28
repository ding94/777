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
       //var_dump($model);exit;
        return $this->render('index' ,['model' =>$model]);
    }

  // public function submitReward($model,$chance,$today,$tommorow){
  //
  //   if ($model->fnum == 7 && $model->snum == 7 && $model->tnum == 7) {
  //     $reward->first = 1;
  //     $reward->price += 10;
  //     $reward->userid = Yii::$app->user->identity->id;
  //     $reward->save();
  //   }
  //   else if ($model->fnum ==$model->snum && $model->snum == $model->tnum && $model->fnumfnum == $model->tnum){
  //     $reward->second = 1;
  //     $reward->price += 5;
  //     $reward->userid = Yii::$app->user->identity->id;
  //     $reward->save();
  //   }
  //   else if($model->fnum == $model->snum || $model->snum == $model->tnum){
  //     $reward->third += 1;
  //     $reward->price += 2;
  //     $reward->userid = Yii::$app->user->identity->id;
  //     $reward->save();
  //   }
  //   else {
  //
  //   }
  //   $chance->chance += 1;
  //   $condition = [
  //       'and',
  //       ['between','updatetime',$today ,$tommorow],
  //       ['in' ,'userid' , Yii::$app->user->identity->id],
  //   ];
  //   Chance::updateAll(['chance' => $chance->chance ],$condition);
  // }
}
