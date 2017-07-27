<?php

namespace app\controllers;

use app\models\Random;
use app\model\chance;
use yii\web\Controller;
use app\controllers\RewardController;
use Yii;

class RandomController extends controller
{
    public static function randomNumGen($chance)
    {
        $reward = RewardController::getReward(1);
        /*
         *detect whether user reach limit amount
         *if price more than 10 user
         *will not get any price anymore
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
                self::verifyLimit($chance);
            }
        }
        
        $value = self::randomSorting($chance);
        return $value;
    }

    public static function random($chance)
    {
        $number = array(1,2,3,4,5,7);

        $random = Random::find()->where('userid = :id and chance = :ch ',[':id' => Yii::$app->user->identity->id ,':ch' => $chance])->one();
        /*
         *find wheter random datbase create
         *if not create 
         *each user only have five chance
         */

        if(empty($random))
        {
            $random = new Random();
        }

        $random->fnum = $number[array_rand($number,1)];
        $random->snum = $number[array_rand($number,1)];
        $random->tnum = $number[array_rand($number,1)];
        $random->userid = Yii::$app->user->identity->id;
        $random->chance = $chance;
        $random->token = 1;
        $random->save();
    }


    public static function verifyLimit($chance)
    {
        $number = array(1,2,3,4,5,7);
        $random = Random::find()->where('userid = :id and token = :tk and  chance = :ch' ,[':id' => Yii::$app->user->identity->id ,':tk' => '1' , ':ch' => $chance])->one();
        if($random)
        {
            $a=$random->fnum;
            $b=$random->snum;
            $c=$random->tnum;

            while($a==$b || $b==$c || $c==$a)
            {
                $a = $number[array_rand($number,1)];
                $b = $number[array_rand($number,1)];
                $c = $number[array_rand($number,1)];
            }

            $random->fnum = $a;
            $random->snum = $b;
            $random->tnum = $c;
            $random->save();
        }
    }

    public static function randomSorting($chance)
    {
        /*
         *get data between user chance and previos chance
         *orderby chance
         */
        $random = Random::find()->where('userid = :id and token = :tk and chance = :ch' ,[':id' => Yii::$app->user->identity->id ,':tk' => '1' ,':ch' => $chance])->orderBy('chance')->one();
        
        return $random;
    }

}
