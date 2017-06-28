<?php

namespace app\controllers;

use Yii;
use yii\web\controller;
use app\controllers\RandomController;
use app\models\Chance;
use app\models\Reward;

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
        elseif($chance->chance == 5)
        {
            return $this->render('index');
        }

        $model = RandomController::randomNumGen($chance);
        
       if(Yii::$app->request->isAjax){
          $this->submitReward($model->fnum, $model->snum, $model->tnum, $chance);
       }
        

        /*
         *find wheter random datbase create
         *if not create one
         */

        if(empty($random))
        {
            $random = new Random();
            $random->fnum = $ansA;
            $random->snum = $ansB;
            $random->tnum = $ansC;
            $random->userid = Yii::$app->user->identity->id;
            $random->chance = 1;
            $random->save();
        }

        /*
         *detect wheter the chance
         *in both random and chance database changed
         *is same or not
         *if not get the ansA,ansB,ansC update to the random
         */
        if($chance->chance == $random->chance)
        {
            $model = $random;
        }
        else if($chance->chance-$random->chance === 1)
        {
            $random->fnum = $ansA;
            $random->snum = $ansB;
            $random->tnum = $ansC;
            $random->chance = $chance->chance;
            $random->save();
            $model  = $random;
        }

    // {
    //   $user = Chance::find()->where('userid = :id ',[':id' => Yii::$app->user->identity->id])->one();
    //   if(empty($user))
    //   {
    //        $model = new Chance;
    //   }
    //
      if(Yii::$app->request->isAjax){
          $this->submitReward($random->fnum, $random->snum, $random->tnum, $chance);
      }

>>>>>>> 64050822840cfd5f6be9fa473a19c7a876c77a65
        return $this->render('index' ,['model' =>$model]);
    }

  public function submitReward($fnum,$snum,$tnum,$chance){

    if ($fnum == 7 && $snum == 7 && $tnum == 7) {
      $reward->first = 1;
      $reward->price += 10;
      $reward->userid = Yii::$app->user->identity->id;
      $reward->save();
    }
    else if ($fnum == $snum && $snum == $tnum && $fnum == $tnum){
      $reward->second = 1;
      $reward->price += 5;
      $reward->userid = Yii::$app->user->identity->id;
      $reward->save();
    }
    else if($fnum == $snum || $snum == $tnum){
      $reward->third += 1;
      $reward->price += 2;
      $reward->userid = Yii::$app->user->identity->id;
      $reward->save();
    }
    else {

    }
    $chance->chance += 1;
    Chance::updateAll(['chance' => $chance->chance ],'userid = :id' ,[':id' =>  Yii::$app->user->identity->id]);
  }
}
