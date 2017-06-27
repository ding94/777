<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chance".
 *
 * @property int $id
 * @property int $chance
 * @property int $userid
 * @property string $createtime
 * @property string $updatetime
 */
class Chance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chance', 'userid'], 'required'],
            [['chance', 'userid'], 'integer'],
            [['createtime', 'updatetime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chance' => 'Chance',
            'userid' => 'Userid',
            'createtime' => 'Createtime',
            'updatetime' => 'Updatetime',
        ];
    }
}
