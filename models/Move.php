<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "moves".
 *
 * @property int $id
 * @property int $type_id
 * @property string $name
 * @property int|null $power
 * @property string|null $description
 * @property int|null $accuracy
 *
 * @property MovesEffect[] $movesEffects
 * @property PokemonInstance[] $pokemonInstances
 * @property PokemonMove[] $pokemonMoves
 */
class Move extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%moves}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['power', 'description', 'accuracy'], 'default', 'value' => null],
            [['type_id', 'name'], 'required'],
            [['type_id', 'power', 'accuracy'], 'integer'],
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
            'type_id' => 'Type ID',
            'name' => 'Name',
            'power' => 'Power',
            'description' => 'Description',
            'accuracy' => 'Accuracy',
        ];
    }

    /**
     * Gets query for [[MovesEffects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMovesEffects()
    {
        return $this->hasMany(MovesEffect::class, ['move_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonInstances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonInstances()
    {
        return $this->hasMany(PokemonInstance::class, ['id' => 'pokemon_instance_id'])->viaTable('pokemon_moves', ['move_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonMoves]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonMoves()
    {
        return $this->hasMany(PokemonMove::class, ['move_id' => 'id']);
    }

}
