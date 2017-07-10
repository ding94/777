<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game_1_record".
 *
 * @property int $recordID
 * @property int $userID
 * @property string $playDate
 * @property string $playTime
 * @property int $token
 * @property int $min_value
 * @property int $max_value
 * @property int $playingNow
 * @property int $ans
 */
class Game1Record extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_1_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userID', 'playDate', 'playTime', 'ans'], 'required'],
            [['userID', 'token', 'min_value', 'max_value', 'playingNow', 'ans' ], 'integer'],
            ['usedTime' ,'integer', 'max' => 10],
            [['playDate', 'playTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recordID' => 'Record ID',
            'userID' => 'User ID',
            'playDate' => 'Play Date',
            'playTime' => 'Play Time',
            'token' => 'Token',
            'min_value' => 'Min Value',
            'max_value' => 'Max Value',
            'playingNow' => 'Playing Now',
            'ans' => 'Ans',
            'usedTime' => 'usedTime',
        ];
    }
}
