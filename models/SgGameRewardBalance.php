<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sg_game_reward_balance".
 *
 * @property int $sg_reward_id
 * @property string $sg_reward_name
 * @property int $sg_balance
 * @property int $sg_positive_balance
 * @property int $sg_negative_balance
 * @property int $in_charge_admin_id
 */
class SgGameRewardBalance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sg_game_reward_balance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sg_reward_name', 'sg_balance', 'sg_positive_balance', 'sg_negative_balance', 'in_charge_admin_id'], 'required'],
            [['sg_balance', 'sg_positive_balance', 'sg_negative_balance', 'in_charge_admin_id'], 'integer'],
            [['sg_reward_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sg_reward_id' => 'Sg Reward ID',
            'sg_reward_name' => 'Sg Reward Name',
            'sg_balance' => 'Sg Balance',
            'sg_positive_balance' => 'Sg Positive Balance',
            'sg_negative_balance' => 'Sg Negative Balance',
            'in_charge_admin_id' => 'In Charge Admin ID',
        ];
    }
}
