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
            [['userid'], 'required'],
            [['price', 'third', 'userid'], 'integer'],
            [['first', 'second'], 'string'],
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
            'first' => 'First',
            'second' => 'Second',
            'third' => 'Third',
            'userid' => 'Userid',
            'createtime' => 'Createtime',
        ];
    }
}
