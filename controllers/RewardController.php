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
     *
     */
    public static function getReward()
    {
        $reward = Reward::find()->where('userid = :id',[':id' => Yii::$app->user->identity->id])->all();
        return $reward;
    }

    /*
    *save reward prize to database
    */

    public static function submitReward($model,$chance,$today,$tommorow)
    {
        if($chance->chance <= 6)
        {
            $reward = new Reward;
            $reward->userid = Yii::$app->user->identity->id;
            if ($model->fnum == 7 && $model->snum == 7 && $model->tnum == 7) {//check first prize
              $reward->status = 1;
              $reward->price = 10;
              $reward->save();
            }
            else if ((($model->fnum == $model->snum) == true) && (($model->snum == $model->tnum) == true)){ //check second prize
              $reward->status = 2;
              $reward->price = 5;
              $reward->save();
            }
            else if($model->fnum == $model->snum || $model->snum == $model->tnum){ //check third prize
              $reward->status = 1;
              $reward->price = 2;
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
}
