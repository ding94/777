<?php

namespace app\controllers;
use yii\helpers\Json;
use app\models\Reward;
use app\models\Chance;
use app\models\User;
use yii\web\controller;
use Yii;

class RewardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionGetdata()
    {
        $value = self::getReward(3);
        $value = Json::encode($value[0]);
        return $value;
    }

    /*
     *
     */
    public static function getReward($choice)
    {
        if($choice == 1)
        {
            $reward = Reward::find()->where('userid = :id',[':id' => Yii::$app->user->identity->id])->all();
        }
        
        elseif($choice == 2)
        {
            $reward =  Reward::find()->limit(10)->orderBy(['(createtime)'=> SORT_DESC])->all();
            foreach($reward as $rewards)
            {
                $rewards['userid'] = User::find()->where('id = :id' ,[':id' => $rewards['userid']])->one()->username;
                $rewards['createtime'] = date("M-d G:i" , strtotime($rewards['createtime']));
            }
            
        }
        elseif($choice == 3)
        {
            $reward = Reward::find()->where('userid = :id' ,[':id' =>  Yii::$app->user->identity->id])->limit(10)->orderBy(['(createtime)'=> SORT_DESC])->all();
            foreach($reward as $rewards)
            {
                $rewards['userid'] = User::find()->where('id = :id' ,[':id' => $rewards['userid']])->one()->username;
                $rewards['createtime'] = date("M-d G:i" , strtotime($rewards['createtime']));
            }
        }
        else
        {
            return false;
        }
        
        return $reward;
    }

    /*
    *save reward prize to database
    */

    public static function submitReward($model,$chance,$today,$tommorow)
    {
        if($chance->chance < 6)
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
              $reward->status = 3;
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
