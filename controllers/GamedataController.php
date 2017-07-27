<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Game1Data;
use app\controllers\RewardController;

class GamedataController extends controller
{
     public static function gameDataGen($recordID,$userInput,$token,$usedTime)
     {
          $gameData =  Game1Data::find()->where('recordID = :did' ,[':did' => $recordID])->one();//获得记录
        
          if(empty($gameData)) // 如果记录为空，开启新记录
          {
              $gameData = new Game1Data;
              $gameData->recordID = $recordID;
          }
  
          $record = "record_".$usedTime; //记录每个游玩次数
          $gameData[$record] = $userInput;
         
          if($token == 0)
          {
              $gameData->success = 1; //记录用户已成功
              RewardController::submitInbetween($usedTime);
          }
          $gameData->save();
     }
}