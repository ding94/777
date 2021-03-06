<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reward".
 *
 * @property int $id
 * @property int $price
 * @property string $first
 * @property string $second
 * @property int $third
 * @property int $userid
 * @property string $createtime
 */
class Reward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'reward';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid' ,'price' ,'status','game_id'], 'required'],
            [['price', 'status', 'userid'], 'integer'],
            [['createtime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'status' => 'Status',
            'userid' => 'Userid',
            'game_id' => 'Game ID',
            'createtime' => 'Createtime',
        ];
    }
}
