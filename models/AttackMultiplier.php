<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attack_multipliers".
 *
 * @property int $user_type_id
 * @property int $opponent_type_id
 * @property int $multiplier
 *
 * @property Type $opponentType
 * @property Type $userType
 */
class AttackMultiplier extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%attack_multipliers}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['multiplier'], 'default', 'value' => 1],
            [['user_type_id', 'opponent_type_id'], 'required'],
            [['user_type_id', 'opponent_type_id', 'multiplier'], 'integer'],
            [['user_type_id', 'opponent_type_id'], 'unique', 'targetAttribute' => ['user_type_id', 'opponent_type_id']],
            [['opponent_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['opponent_type_id' => 'id']],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['user_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_type_id' => 'User Type ID',
            'opponent_type_id' => 'Opponent Type ID',
            'multiplier' => 'Multiplier',
        ];
    }

    /**
     * Gets query for [[OpponentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpponentType()
    {
        return $this->hasOne(Type::class, ['id' => 'opponent_type_id']);
    }

    /**
     * Gets query for [[UserType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(Type::class, ['id' => 'user_type_id']);
    }

}
