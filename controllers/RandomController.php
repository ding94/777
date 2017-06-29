<?php

namespace app\controllers;

use app\models\Random;
use yii\web\controller;
use app\controllers\RewardController;
use Yii;

class RandomController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public static function randomNumGen($chance)
    {
        self::random();
        $reward = RewardController::getReward();
        /*
         *detect whether user limit the amount set
         *or user got 1 first , 1 second ,5 third
         *and pass chance to tell which data selected
         *price and thrid in dataase is int
         *first and second is enum 
         */
        if($reward['price'] == 25)
        {
            self::verifyLimit($reward,1 , $chance->chance);
        }
        
        else if($reward['first'] == '1' && $reward['second'] == '1')
        {
            self::verifyLimit($reward,2 ,$chance->chance);
        }
        
        else if($reward['first'] == '1' && $reward['third'] == 5)
        {
            self::verifyLimit($reward,4 ,$chance->chance);
        }
        
        else if($reward['first'] == '1')
        {
            self::verifyLimit($reward,3 ,$chance->chance);
        }
        
        else if($reward['second'] == '1' && $reward['third'] == 5)
        {
            self::verifyLimit($reward,5 ,$chance->chance);
        }
        
        else if($reward['second'] == '1')
        {
            self::verifyLimit($reward,6 ,$chance->chance);
        }
        
        else if($reward['third'] == 5)
        {
            self::verifyLimit($reward,7 ,$chance->chance);
        }

        $random = Random::find()->where('userid = :id and token = :tk' ,[':id' => Yii::$app->user->identity->id ,':tk' => '1'])->all();


        /*
         *sorting by chance before do anything
         */
        $count = count($random);
        for($i = 0 ;$i<$count;$i++)
        {
            for($j = 0;$j<$count;$j++)
            {
                if($random[$i]['chance'] < $random[$j]['chance'])
                {
                    $temp = $random[$i];
                    $random[$i] = $random[$j];
                    $random[$j] = $temp;
                }
            }
        }

        /*
         *detect wheter the chance
         *in current user play chance
         *record it into value 1
         *and record previos chance into value 0
         *if first time play value is null
         */

        foreach($random as $k=>$data)
        {
            if($chance->chance == $data['chance'])
            {
                if($k-1 == -1)
                {
                    $value['0'] = "";
                }
                else{
                    $value['0'] = $random[$k-1];
                }
                $value['1'] = $data;
            }
        }

        return $value;
    }

    public static function random()
    {
        $number = array(1,2,3,4,5,7);
        $count = count($number);

        $random = Random::find()->where('userid = :id ',[':id' => Yii::$app->user->identity->id])->all();
        /*
         *find wheter random datbase create
         *if not create five
         *loop five time with increment of chance
         *each user only have five chance and token will be refresh everyday
         */

        if(empty($random))
        {
            for($i=1;$i<=6;$i++)
            {
                $random = new Random();
                $random->fnum = $number[array_rand($number,1)];
                $random->snum = $number[array_rand($number,1)];
                $random->tnum = $number[array_rand($number,1)];
                $random->userid = Yii::$app->user->identity->id;
                $random->chance = $i;
                $random->token = 1;
                $random->save();
            }
        }
        else if($random[0]['token'] == 0)
        {
            foreach($random as $k=>$data)
            {
                $data->fnum = $number[array_rand($number,1)];
                $data->snum = $number[array_rand($number,1)];
                $data->tnum = $number[array_rand($number,1)];
                $data->userid = Yii::$app->user->identity->id;
                $data->chance = $k+1;
                $data->token = 1;
                $data->save();
            }
        }
    }


    public static function verifyLimit($data , $type ,$chance)
    {
        /*
         *depend of which type put in the case
         *each case have their on format
         */
        $number = array(1,2,3,4,5,7);
        $random = Random::find()->where('userid = :id and token = :tk and  chance = :ch' ,[':id' => Yii::$app->user->identity->id ,':tk' => '1' , ':ch' => $chance])->one();
        $a=$random->fnum;
        $b=$random->snum;
        $c=$random->tnum;

        switch($type)
        {
            case 1:
                while($a==$b || $b==$c || $c==$a)
                {
                    $a = $number[array_rand($number,1)];
                    $b = $number[array_rand($number,1)];
                    $c = $number[array_rand($number,1)];
                }
                break;
            case 2:
                while($a== $b && $b== $c)
                {
                    $a = $number[array_rand($number,1)];
                    $b = $number[array_rand($number,1)];
                    $c = $number[array_rand($number,1)];
                }
                break;
            case 3:
                while($a== 7 && $b== 7 && $c== 7)
                {
                    $a = $number[array_rand($number,1)];
                    $b = $number[array_rand($number,1)];
                    $c = $number[array_rand($number,1)];
                }
                break;
            case 4:
                while(($a == 7 && $b ==7 && $c ==7)|| (($a == $b) || ($b == $c)))
                {
                    $a = $number[array_rand($number,1)];
                    $b = $number[array_rand($number,1)];
                    $c = $number[array_rand($number,1)];  
                }
                break;
            case 5:
                while(($a != 7 && $b !=7 && $c !=7) || ($a== $b && $b== $c) )
                {
                    $a = $number[array_rand($number,1)];
                    $b = $number[array_rand($number,1)];
                    $c = $number[array_rand($number,1)];
                }
                break;
            case 6:
                while(($a != 7 && $b !=7 && $c !=7) || ($a== $b && $b== $c))
                {
                    $a = $number[array_rand($number,1)];
                    $b = $number[array_rand($number,1)];
                    $c = $number[array_rand($number,1)];
                }
                break;
            case 7:
                if($a== $b && $b== $c)
                {

                }
                else{
                    while(($a==$b)||($b==$c))
                    {
                        $a = $number[array_rand($number,1)];
                        $b = $number[array_rand($number,1)];
                        $c = $number[array_rand($number,1)];
                    }
                }
                break;

           }

        $random->fnum = $a;
        $random->snum = $b;
        $random->tnum = $c;
        $random->save();
    }

}
