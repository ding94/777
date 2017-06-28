<?php

namespace app\controllers;
use app\models\Reward;
use app\models\Chance;
use yii\web\controller;
use Yii;

class RewardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /*
    *Check if reward database is empty or not
    *if empty, create a default reward object
    *if not empty, use the existing reward object
    */

    public static function emptyReward()
    {
      $reward = Reward::find()->where('userid = :id',[':id' => Yii::$app->user->identity->id])->one();
      if (empty($reward)) {
        $reward = new Reward();
        $reward->userid = Yii::$app->user->identity->id;
        $reward->save();
      }
    }

    /*
    *save reward prize to database
    */

    public static function submitReward($model,$chance,$today,$tommorow)
    {
      $reward = Reward::find()->where('userid = :id',[':id' => Yii::$app->user->identity->id])->one();
      if ($model->fnum == 7 && $model->snum == 7 && $model->tnum == 7) { //check first prize
        $reward->first = 1;
        $reward->price += 10;
        $reward->userid = Yii::$app->user->identity->id;
        $reward->save();
      }
      else if ($model->fnum ==$model->snum && $model->snum == $model->tnum && $model->fnum == $model->tnum){ //check second prize
        $reward->second = 1;
        $reward->price += 5;
        $reward->userid = Yii::$app->user->identity->id;
        $reward->save();
      }
      else if($model->fnum == $model->snum || $model->snum == $model->tnum){ //check third prize
        $reward->third += 1;
        $reward->price += 2;
        $reward->userid = Yii::$app->user->identity->id;
        $reward->save();
      }
      $chance->chance += 1;
      $condition = [
          'and',
          ['between','updatetime',$today ,$tommorow],
          ['in' ,'userid' , Yii::$app->user->identity->id],
      ];
      Chance::updateAll(['chance' => $chance->chance ],$condition);
    }

}
