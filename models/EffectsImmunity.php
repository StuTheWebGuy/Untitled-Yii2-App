<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "effects_immunities".
 *
 * @property int $effect_id
 * @property int $immunity_id
 *
 * @property Effect $effect
 * @property Immunity $immunity
 */
class EffectsImmunity extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%effects_immunities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['effect_id', 'immunity_id'], 'required'],
            [['effect_id', 'immunity_id'], 'integer'],
            [['effect_id', 'immunity_id'], 'unique', 'targetAttribute' => ['effect_id', 'immunity_id']],
            [['effect_id'], 'exist', 'skipOnError' => true, 'targetClass' => Effect::class, 'targetAttribute' => ['effect_id' => 'id']],
            [['immunity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Immunity::class, 'targetAttribute' => ['immunity_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'effect_id' => 'Effect ID',
            'immunity_id' => 'Immunity ID',
        ];
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
     * Gets query for [[Immunity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImmunity()
    {
        return $this->hasOne(Immunity::class, ['id' => 'immunity_id']);
    }

}
