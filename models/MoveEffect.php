<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "moves_effects".
 *
 * @property int $move_id
 * @property int $effect_id
 * @property int $chance_id
 *
 * @property Chance $chance
 * @property Effect $effect
 * @property Move $move
 */
class MoveEffect extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%moves_effects}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['move_id', 'effect_id', 'chance_id'], 'required'],
            [['move_id', 'effect_id', 'chance_id'], 'integer'],
            [['move_id', 'effect_id', 'chance_id'], 'unique', 'targetAttribute' => ['move_id', 'effect_id', 'chance_id']],
            [['chance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chance::class, 'targetAttribute' => ['chance_id' => 'id']],
            [['effect_id'], 'exist', 'skipOnError' => true, 'targetClass' => Effect::class, 'targetAttribute' => ['effect_id' => 'id']],
            [['move_id'], 'exist', 'skipOnError' => true, 'targetClass' => Move::class, 'targetAttribute' => ['move_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'move_id' => 'Move ID',
            'effect_id' => 'Effect ID',
            'chance_id' => 'Chance ID',
        ];
    }

    /**
     * Gets query for [[Chance]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChance()
    {
        return $this->hasOne(Chance::class, ['id' => 'chance_id']);
    }

    /**
     * Gets query for [[Effect]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEffect()
    {
        return $this->hasOne(Effect::class, ['id' => 'effect_id']);
    }

    /**
     * Gets query for [[Move]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMove()
    {
        return $this->hasOne(Move::class, ['id' => 'move_id']);
    }

}
