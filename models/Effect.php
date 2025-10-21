<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "effects".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property EffectsImmunity[] $effectsImmunities
 * @property Immunity[] $immunities
 * @property MoveEffect[] $moveEffects
 */
class Effect extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%effects}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[EffectsImmunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEffectsImmunities()
    {
        return $this->hasMany(EffectsImmunity::class, ['effect_id' => 'id']);
    }

    /**
     * Gets query for [[Immunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImmunities()
    {
        return $this->hasMany(Immunity::class, ['id' => 'immunity_id'])->viaTable('effects_immunities', ['effect_id' => 'id']);
    }

    /**
     * Gets query for [[MoveEffects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMoveEffects()
    {
        return $this->hasMany(MoveEffect::class, ['effect_id' => 'id']);
    }

}
