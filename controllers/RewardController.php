<?php

namespace app\controllers;

use Yii;
use app\models\Reward;

class RewardController extends \yii\web\Controller
{
    public function actionIndex()
    {
      {
      $user = Reward::find()->where('userid = :id ',[':id' => Yii::$app->user->identity->id])->one();
      if(empty($user))
      {
           $model = new Reward;
      }
      else {
        $model = new Reward;
      }

      if(Yii::$app->request->isAjax){
          $data = Yii::$app->request->post();
          $model->price = $data['price'];
          $model->userid = Yii::$app->user->identity->id;
          $model->save();
      }
        return $this->render('index');
    }

  }
}
