<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game_1_data".
 *
 * @property int $dataID
 * @property int $record_1
 * @property int $record_2
 * @property int $record_3
 * @property int $record_4
 * @property int $record_5
 * @property int $success
 * @property int $usedTimes
 */
class Game1Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_1_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recordID'], 'required'],
            [['recordID', 'record_1', 'record_2', 'record_3', 'record_4', 'record_5', 'success'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'dataID' => 'Data ID',
            'record_1' => 'Record 1',
            'record_2' => 'Record 2',
            'record_3' => 'Record 3',
            'record_4' => 'Record 4',
            'record_5' => 'Record 5',
            'success' => 'Success',
            'usedTimes' => 'Used Times',
        ];
    }
}
