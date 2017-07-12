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
          $gameData =  Game1Data::find()->where('recordID = :did' ,[':did' => $recordID])->one();
        
          if(empty($gameData))
          {
              $gameData = new Game1Data;
              $gameData->recordID = $recordID;
          }
  
          $record = "record_".$usedTime;
          $gameData[$record] = $userInput;
         
          if($token == 0)
          {
              $gameData->success = 1;
              RewardController::submitInbetween($usedTime);
          }
          $gameData->save();
     }
}