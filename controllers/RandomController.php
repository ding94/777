<?php

namespace app\controllers;
use app\models\Random;
use yii\web\controller;
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

            }
        }


        return $value;
    }

    public static function random()
    {
        $number = array(1,2,3,4,5,7);
        $count = count($number);
        //$ansA = array_rand($number,1);
        //$ansB = array_rand($number,1);
        //$ansC = array_rand($number,1);

        $random = Random::find()->where('userid = :id ',[':id' => Yii::$app->user->identity->id])->all();
        /*
         *find wheter random datbase create
         *if not create five
         *loop five time with increment of chance
         *each user only have five chance and token will be refresh everyday
         */

        if(empty($random))
        {
            for($i=1;$i<=5;$i++)
            {
                $random = new Random();
                $random->fnum = array_rand($number,1);
                $random->snum = array_rand($number,1);
                $random->tnum = array_rand($number,1);
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
                $data->fnum = array_rand($number,1);
                $data->snum = array_rand($number,1);
                $data->tnum = array_rand($number,1);
                $data->userid = Yii::$app->user->identity->id;
                $data->chance = $k+1;
                $data->token = 1;
                $data->save();
            }
        }
    }

}
