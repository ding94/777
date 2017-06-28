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
        $number = array(1,2,3,4,5,7);
        $count = count($number);
        $ansA = array_rand($number,1);
        $ansB = array_rand($number,1);
        $ansC = array_rand($number,1);

         $random = Random::find()->where('userid = :id' ,[':id' => Yii::$app->user->identity->id])->one();

        /*
         *find wheter random datbase create
         *if not create one
         */

        if(empty($random))
        {
            $random = new Random();
            $random->fnum = $ansA;
            $random->snum = $ansB;
            $random->tnum = $ansC;
            $random->userid = Yii::$app->user->identity->id;
            $random->chance = 1;
            $random->save();
        }

        /*
         *detect wheter the chance
         *in both random and chance database changed
         *is same or not
         *if not get the ansA,ansB,ansC update to the random
         */
        if($chance->chance == $random->chance)
        {
            $model = $random;
        }
        else if($chance->chance-$random->chance === 1)
        {
            $random->fnum = $ansA;
            $random->snum = $ansB;
            $random->tnum = $ansC;
            $random->chance = $chance->chance;
            $random->save();
            $model  = $random;
        }
        
        return $model;
    }

}
