<?php

namespace app\controllers;

use app\models\SgGameRewardBalance;
use yii\web\Controller;
use Yii;

class SgGameRewardBalanceController extends Controller
{
    public static function reduceBalance($value)
    {
         $data = SgGameRewardBalance::find()->where('sg_reward_id = :id' ,[':id' => 1])->one();
         $data->sg_balance -= $value;
         $data->sg_negative_balance += $value;
         $data->save();
    }
}