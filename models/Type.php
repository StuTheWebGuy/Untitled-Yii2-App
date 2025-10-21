<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "types".
 *
 * @property int $id
 * @property int $images_collection_id
 * @property string|null $name
 *
 * @property AttackMultiplier[] $attackMultipliers
 * @property AttackMultiplier[] $attackMultipliers0
 * @property DefenseMultiplier[] $defenseMultipliers
 * @property DefenseMultiplier[] $defenseMultipliers0
 * @property Immunity[] $immunities
 * @property Type[] $opponentTypes
 * @property Type[] $opponentTypes0
 * @property PokemonSpecy[] $pokemonSpecies
 * @property PokemonSpecy[] $pokemonSpecies0
 * @property PokemonType[] $pokemonTypes
 * @property PokemonType[] $pokemonTypes0
 * @property Type[] $userTypes
 * @property Type[] $userTypes0
 */
class Type extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%types}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'default', 'value' => null],
            [['images_collection_id'], 'required'],
            [['images_collection_id'], 'integer'],
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
            'images_collection_id' => 'Images Collection ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[AttackMultipliers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAttackMultipliers()
    {
        return $this->hasMany(AttackMultiplier::class, ['opponent_type_id' => 'id']);
    }

    /**
     * Gets query for [[AttackMultipliers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAttackMultipliers0()
    {
        return $this->hasMany(AttackMultiplier::class, ['user_type_id' => 'id']);
    }

    /**
     * Gets query for [[DefenseMultipliers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDefenseMultipliers()
    {
        return $this->hasMany(DefenseMultiplier::class, ['opponent_type_id' => 'id']);
    }

    /**
     * Gets query for [[DefenseMultipliers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDefenseMultipliers0()
    {
        return $this->hasMany(DefenseMultiplier::class, ['user_type_id' => 'id']);
    }

    /**
     * Gets query for [[Immunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImmunities()
    {
        return $this->hasMany(Immunity::class, ['immune_type_id' => 'id']);
    }

    /**
     * Gets query for [[OpponentTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpponentTypes()
    {
        return $this->hasMany(Type::class, ['id' => 'opponent_type_id'])->viaTable('attack_multipliers', ['user_type_id' => 'id']);
    }

    /**
     * Gets query for [[OpponentTypes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpponentTypes0()
    {
        return $this->hasMany(Type::class, ['id' => 'opponent_type_id'])->viaTable('defense_multipliers', ['user_type_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonSpecies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonSpecies()
    {
        return $this->hasMany(PokemonSpecy::class, ['id' => 'pokemon_species_id'])->viaTable('pokemon_types', ['type_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonSpecies0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonSpecies0()
    {
        return $this->hasMany(PokemonSpecy::class, ['id' => 'pokemon_species_id'])->viaTable('pokemon_types', ['type_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonTypes()
    {
        return $this->hasMany(PokemonType::class, ['type_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonTypes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonTypes0()
    {
        return $this->hasMany(PokemonType::class, ['type_id' => 'id']);
    }

    /**
     * Gets query for [[UserTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTypes()
    {
        return $this->hasMany(Type::class, ['id' => 'user_type_id'])->viaTable('attack_multipliers', ['opponent_type_id' => 'id']);
    }

    /**
     * Gets query for [[UserTypes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTypes0()
    {
        return $this->hasMany(Type::class, ['id' => 'user_type_id'])->viaTable('defense_multipliers', ['opponent_type_id' => 'id']);
    }

}
