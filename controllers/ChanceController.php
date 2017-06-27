<?php

namespace app\controllers;

use Yii;
use models\Chance;

class ChanceController extends \yii\web\Controller
{
    public function actionIndex(){
        $number = array(1,2,3,4,5,7);
        $count = count($number);
        $ansA = array_rand($number,1);
        $ansB = array_rand($number,1);
        $ansC = array_rand($number,1);
    // {
    //   $user = Chance::find()->where('userid = :id ',[':id' => Yii::$app->user->identity->id])->one();
    //   if(empty($user))
    //   {
    //        $model = new Chance;
    //   }
    //
    //   if(Yii::$app->request->isAjax){
    //       $data = Yii::$app->request->post();
    //       $model->fNum = $data['fnum'];
    //       $model->userid = Yii::$app->user->identity->id;
    //       $model->isOn = 1;
    //       $model->save();
    //   }
      
        return $this->render('index' ,['a'=>$ansA ,'b'=>$ansB , 'c'=>$ansC]);
    }

}
