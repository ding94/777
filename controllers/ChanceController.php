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

         //调查是否是注册用户
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
            if($chance < 5)
            {
                RandomController::random($chance+1);
                RewardController::submitReward($chance+1);
            }
        }

        return $this->render('index' ,['model' =>$model , 'allReward' => $allReward , 'userReward' => $userReward]);
    }

    public function actionGetdata()
    {
        /*
        * return back data to index page
        * 传递给js 
        */

        $chance = self::getChance();
        $value = RandomController::randomSorting($chance);
        $value = Json::encode($value);
        return $value;

    }

    public static function getChance()
    {
        /*
         * find wheter chance database create
         * if not create one
         *查找用户今日玩的次数
         *如数据库空，创建一个
         */

        $today =  date('Y-m-d 00:00:00');
        $tommorow = date('Y-m-d 00:00:00', strtotime(' +1 day'));
        $chance = Chance::find()->where('userid = :id' ,[':id' => Yii::$app->user->identity->id])->andWhere(['between','updatetime',$today ,$tommorow])->one();

        if(empty($chance))
        {
            $chance = new Chance;
            $chance->chance = 0;
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
         *to stp randomSorting run to increase the chance
         *拿的三组号码出来对比用户玩的次数
         */
        if($chance < 6)
        {
            $model = RandomController::randomSorting($chance);
        }
        else
        {
            $model = Random::find()->where('userid = :id and token = :tk' , [':id' => Yii::$app->user->identity->id , ':tk' => '1'])->andWhere('chance > :ch',[':ch' => 4])->orderBy('chance')->all();
        }
        return $model;
    }
}
