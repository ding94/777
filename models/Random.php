<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "random".
 *
 * @property int $id
 * @property int $fnum
 * @property int $snum
 * @property int $tnum
 * @property int $userid
 */
class Random extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'random';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fnum', 'snum', 'tnum', 'userid'], 'required'],
            [['fnum', 'snum', 'tnum', 'userid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fnum' => 'Fnum',
            'snum' => 'Snum',
            'tnum' => 'Tnum',
            'userid' => 'Userid',
        ];
    }
}
