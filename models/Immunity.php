<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "immunities".
 *
 * @property int $id
 * @property int|null $immune_type_id
 *
 * @property Effect[] $effects
 * @property EffectsImmunity[] $effectsImmunities
 * @property Type $immuneType
 */
class Immunity extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%immunities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['immune_type_id'], 'default', 'value' => null],
            [['immune_type_id'], 'integer'],
            [['immune_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['immune_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'immune_type_id' => 'Immune Type ID',
        ];
    }

    /**
     * Gets query for [[Effects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEffects()
    {
        return $this->hasMany(Effect::class, ['id' => 'effect_id'])->viaTable('effects_immunities', ['immunity_id' => 'id']);
    }

    /**
     * Gets query for [[EffectsImmunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEffectsImmunities()
    {
        return $this->hasMany(EffectsImmunity::class, ['immunity_id' => 'id']);
    }

    /**
     * Gets query for [[ImmuneType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImmuneType()
    {
        return $this->hasOne(Type::class, ['id' => 'immune_type_id']);
    }

}
