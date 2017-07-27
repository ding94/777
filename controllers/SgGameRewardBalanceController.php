<?php

namespace app\controllers;

use app\models\SgGameRewardBalance;
use yii\web\Controller;
use Yii;

class SgGameRewardBalanceController extends controller
{
    public static function reduceBalance($value)
    {
    	//公司给予的奖励限额，中奖将扣除
         $data = SgGameRewardBalance::find()->where('sg_reward_id = :id' ,[':id' => 1])->one();
         $data->sg_balance -= $value;
         $data->sg_negative_balance += $value;
         $data->save();
    }
}