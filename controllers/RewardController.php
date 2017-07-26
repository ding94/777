<?php

namespace app\controllers;
use yii\helpers\Json;
use app\models\Reward;
use app\models\Chance;
use app\models\User;
use yii\web\Controller;
use app\controllers\SgGameRewardBalanceController;
use Yii;

class RewardController extends controller
{
    
    public function actionGetdata()
    {
        $value = self::getReward(3);
        if($value == false)
        {
            return false;
        }
        else{
             $value = Json::encode($value[0]);
             return $value;
        }
    }

    /*
     *detect which type of reward
     */
    public static function getReward($choice)
    {
        switch($choice){
            case 1:
                $reward = Reward::find()->where('userid = :id and game_id = :game',[':id' => Yii::$app->user->identity->id , ':game' => 'A1'])->all();
                break;
            
            case 2:
                $reward =  Reward::find()->where('game_id = :game',[':game' => 'A1'])->limit(10)->orderBy(['(createtime)'=> SORT_DESC])->all();
                foreach($reward as $rewards)
                {
                    $rewards['userid'] = User::find()->where('id = :id' ,[':id' => $rewards['userid']])->one()->username;
                    $rewards['createtime'] = date("M-d G:i" , strtotime($rewards['createtime']));
                }
                break;
            
            case 3:
                $reward = Reward::find()->where('userid = :id and game_id = :game',[':id' => Yii::$app->user->identity->id , ':game' => 'A1'])->limit(10)->orderBy(['(createtime)'=> SORT_DESC])->all();
                if(empty($reward))
                {
                    return false;
                }
                foreach($reward as $rewards)
                {
                    $rewards['userid'] = User::find()->where('id = :id' ,[':id' => $rewards['userid']])->one()->username;
                    $rewards['createtime'] = date("M-d G:i" , strtotime($rewards['createtime']));
                }
                break;
            default:
                $reward = "No inside the choice";
            break;  
        }
        
        return $reward;
    }

    /*
    *save reward of random prize to database
    */

    public static function submitReward($model,$chance)
    {
        $today =  date('Y-m-d 00:00:00');
        $tommorow = date('Y-m-d 00:00:00', strtotime(' +1 day'));

        if($chance < 6)
        {
            $reward = new Reward;
            $reward->userid = Yii::$app->user->identity->id;
            $reward->game_id = "A1";
            if ($model->fnum == 7 && $model->snum == 7 && $model->tnum == 7) {//check first prize
                $reward->status = 1;
                $reward->price = 10;
            }
            else if ((($model->fnum == $model->snum) == true) && (($model->snum == $model->tnum) == true)){ //check second prize
                $reward->status = 2;
                $reward->price = 5;
            }
            else if($model->fnum == $model->snum || $model->snum == $model->tnum){ //check third prize
              $reward->status = 3;
              $reward->price = 2;
            }
            
            $reward->save();
            $chance += 1;
      
            $condition = [
                'and',
                ['between','updatetime',$today ,$tommorow],
                ['in' ,'userid' , Yii::$app->user->identity->id],
            ];
            Chance::updateAll(['chance' => $chance ],$condition);
        }
    }
    
    /*
     *save reward Inbetween prize to database
     */
    
    public static function submitInbetween($usedTime)
    {
        $reward = new Reward;
        $reward->userid = Yii::$app->user->identity->id;
        $reward->game_id = "B1";
        if($usedTime == 1)
        {
            $reward->status =1;
            $reward->price = 10;
        }
        elseif($usedTime == 2 || $usedTime == 3)
        {
            $reward->status =2;
            $reward->price = 5;
        }
        else{
            $reward->status =3;
            $reward->price = 2;
        }
        $reward->save();
        SgGameRewardBalanceController::reduceBalance($reward->price);
    }

    public static function rewardTable()
    {
       $reward = Reward::find()->where('game_id = :gid',['gid' => "B1"])->limit(7)->orderBy(['(createtime)'=> SORT_DESC])->all();
        foreach($reward as $rewards)
        {
            $rewards['userid'] = User::find()->where('id = :id' ,[':id' => $rewards['userid']])->one()->username;
        }

       return $reward;
    }
}
