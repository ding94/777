<?php

namespace app\controllers;

use app\models\Random;
use app\model\chance;
use yii\web\Controller;
use app\controllers\RewardController;
use Yii;

class RandomController extends controller
{
    public static function MaxLimit()
    {
        $reward = RewardController::getReward(1);
        /*
         *detect whether user reach limit amount
         *if price more than 10 user
         *return true
         *查看用户的中奖次数，
         *超过返回 true
         */
      
        if($reward)
        {
            $sum = 0;
            foreach($reward as $rewards)
            {
                $sum += $rewards['price'];
            }
            if($sum >= 10)
            {
                return true;
            }
        }
        
        //$value = self::randomSorting($chance);
        return false;
    }

    public static function random($chance)
    {
        /*
         *  create random number based on user chance
         *  if MaxLimit is true, loop until 3 random number dif
         *  创建三组号码对比用户的次数
         *  如果 MaxLimit 返回 对， 重复号码直到
         *  3组号码都不一样
         */
        $number = array(1,2,3,4,5,7);

        $a=$number[array_rand($number,1)];
        $b=$number[array_rand($number,1)];
        $c=$number[array_rand($number,1)];

        $random = Random::find()->where('userid = :id and chance = :ch ',[':id' => Yii::$app->user->identity->id ,':ch' => $chance])->one();
        /*
         *find wheter random datbase create
         *if not create 
         *each user only have five chance
         */
        $limit = self::MaxLimit();

        if(empty($random))
        {
            $random = new Random();
        }

        if($limit == true)
        {
             while($a==$b || $b==$c || $c==$a)
            {
                $a = $number[array_rand($number,1)];
                $b = $number[array_rand($number,1)];
                $c = $number[array_rand($number,1)];
            }
        }

        $random->fnum = $a;
        $random->snum = $b;
        $random->tnum = $c;

        $random->userid = Yii::$app->user->identity->id;
        $random->chance = $chance;
        $random->token = 1;

        $random->save();
    }


    public static function randomSorting($chance)
    {
        /*
         *get data between user chance 
         *orderby chance
         *根据用户的次数来放回数据
         */
        $random = Random::find()->where('userid = :id and token = :tk and chance = :ch' ,[':id' => Yii::$app->user->identity->id ,':tk' => '1' ,':ch' => $chance])->orderBy('chance')->one();
        
        return $random;
    }

}
