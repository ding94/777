<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use app\controllers\GamedataController;
use app\models\Game1Record;
use app\models\Reward;
use app\models\User;
use yii\helpers\ArrayHelper;

class InbetweenController extends controller
{
    public function actionIndex(){
        $this->layout = "inbetween";
        
        //调查是否是注册用户
        if(Yii::$app->user->getIsGuest())
        {
            Yii::$app->session->setFlash('info' , 'Please Login in');
            return $this->redirect(['/site/login']);
        }


        $today =  date('Y-m-d');//获得现在时间，用于后面获得当日记录
        $record = Game1Record::find()->where('userid = :id and playDate = :date' ,[':id' => Yii::$app->user->identity->id , ':date' => $today])->one();//获取用户游玩资料
        
        
        if(empty($record))//如果用户当日没记录
        {
            
            $record = self::actionCreateRecord($today);//开启新的记录
            //var_dump($record);exit;
        }
        
        if(Yii::$app->request->isAjax){
            if($record->token == 1 && $record->usedTime < 5)// (用户游玩机会 == 1 && 用户游玩次数 < 5)
            {
                $data = Yii::$app->request->post()['record']; // 获得用户输入
            
                if($data <= $record->min_value || $data >= $record->max_value) // （用户输入<=最小值 || 用户输入 >= 最大值）
                {
                    return false; // 不给予资料传输
                }
                
                if($data == $record->ans) // 用户输入 == 答案
                {
                    $record->token = 0; // 游玩机会 = 0
                }
                else
                {
                    if($data > $record->ans)  // 输入大过答案，输入成为新的最大值
                    {
                        $record->max_value=$data;
                    }
                    elseif($data < $record->ans)// 输入小过答案，输入成为新的最小值
                    {
                        $record->min_value=$data;
                    }
                }
                $record->usedTime +=1; //游玩次数+1
                $record->playingNow = $data; //用户当前输入
                $record->save(); //储存
                GamedataController::gameDataGen($record->recordID,$data,$record->token,$record->usedTime); //记录用户输入信息
            }
        }
        $reward = RewardController:: rewardTable(); //获得中奖名单
        //var_dump($reward);exit;
        return $this->render('index' ,['record' => $record, 'reward' => $reward]);
    }

    public function actionCreateRecord($today)
    {
            $record = new Game1Record; //开启新的记录，并进行基本储存
            $record->userID = Yii::$app->user->identity->id;
            $record->playDate =  date('Y-m-d');
            $record->playTime = date('G:i:s');
            $record->min_value = 1;
            $record->max_value = 99;
            $record->ans = rand(2,98);
            $record->save();
            $record = Game1Record::find()->where('userid = :id and playDate = :date' ,[':id' => Yii::$app->user->identity->id , ':date' => $today])->one(); //获得新记录，并返回记录
            return $record;
            
    }

    public function actionGetinput()
    {  
        if(Yii::$app->request->isAjax){
            if(Yii::$app->request->isGet)
            {
                 $today =  date('Y-m-d');
                $record = Game1Record::find()->where('userid = :id and playDate = :date' ,[':id' => Yii::$app->user->identity->id , ':date' => $today])->one(); //获得记录
                $record->userID = User::find()->where('id = :uid' ,[':uid' => Yii::$app->user->identity->id])->one()->username; //将用户id换成用户名
                unset($record['recordID']); // 消除记录id
                   
                if ($record->token == 1) { 
                    // 用户依然进行游戏，消除其游玩次数与答案
                     unset($record['token']);
                    unset($record['ans']);
                }
                else{

                }
                
                 $value = Json::encode($record); //换成另一个格式
                 return $value;
            }
        }
    }

    
}