<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use app\controllers\RandomController;
use app\controllers\RewardController;
use app\models\Chance;
use app\models\Random;
use app\models\Reward;
use app\models\User;

class ChanceController extends controller
{
    public function actionIndex(){
        if(Yii::$app->user->getIsGuest())
        {
            Yii::$app->session->setFlash('info' , 'Please Login in');
            return $this->redirect(['/site/login']);
        }
        
        $this->layout = "minigame";

        $chance = self::getChance();

        $model = self::getNumber($chance);
   
        /*
         *get all user reward
         */
        $allReward = RewardController::getReward(2);
        
        $userReward = RewardController::getReward(3);

        if(Yii::$app->request->isAjax){
            if($chance < 6)
            {
                RewardController::submitReward($model[1],$chance);
            }
        }

        return $this->render('index' ,['model' =>$model , 'allReward' => $allReward , 'userReward' => $userReward]);
    }

    public function actionGetdata()
    {
        if(Yii::$app->request->isAjax){

            $chance = self::getChance();
            $value = RandomController::randomNumGen($chance);
            $value = Json::encode($value[0]);
            return $value;
        }
    }

    public static function getChance()
    {
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
            //RandomController:: random();
        }
        return $chance->chance;
    }

    public static function getNumber($chance)
    {
        /*
         *to stp randomNumGen run to increase the chance
         */
        if($chance < 6)
        {
            $model = RandomController::randomNumGen($chance);
        }
        else
        {
            $model = Random::find()->where('userid = :id and token = :tk' , [':id' => Yii::$app->user->identity->id , ':tk' => '1'])->andWhere('chance > :ch',[':ch' => 4])->orderBy('chance')->all();
        }
        return $model;
    }
}
