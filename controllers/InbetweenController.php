<?php
namespace app\controllers;

use Yii;
use yii\web\controller;
use yii\helpers\Json;
use app\controllers\GamedataController;
use app\models\Game1Record;
use app\models\Reward;

class InbetweenController extends Controller
{
    public function actionIndex(){
        $this->layout = "inbetween";
        
        $today =  date('Y-m-d');
        $record = Game1Record::find()->where('userid = :id and playDate = :date' ,[':id' => Yii::$app->user->identity->id , ':date' => $today])->one();
        
        if(empty($record))
        {
            $record = new Game1Record;
            $record->userID = Yii::$app->user->identity->id;
            $record->playDate =  date('Y-m-d');
            $record->playTime = date('G:i:s');
            $record->min_value = 1;
            $record->max_value = 99;
            $record->ans = 51;
            $record->save();
        }
        
        if(Yii::$app->request->isAjax){
            if($record->usedTime <= 5)
            {
                $data = Yii::$app->request->post()['record'];
            
                if($data <= $record->min_value || $data >= $record->max_value)
                {
                    return false;
                }
                
                if($data == $record->ans)
                {
                    $record->token = 0;
                }
                else
                {
                    if($data > $record->ans)
                    {
                        $record->max_value=$data;
                    }
                    elseif($data < $record->ans)
                    {
                        $record->min_value=$data;
                    }
                }
                $record->usedTime +=1;
                $record->playingNow = $data;
                $record->save();
                GamedataController::gameDataGen($record->recordID,$data,$record->token,$record->usedTime);
            }
        }
        $record = Game1Record::find()->where('userid = :id and playDate = :date' ,[':id' => Yii::$app->user->identity->id , ':date' => $today])->one();
        $reward = RewardController:: rewardTable(); 
        //var_dump($reward);exit;
        return $this->render('index' ,['record' => $record, 'reward' => $reward]);
    }
}