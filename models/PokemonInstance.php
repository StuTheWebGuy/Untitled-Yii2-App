<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pokemon_instances".
 *
 * @property int $id
 * @property int|null $team_id
 * @property int|null $box_id
 * @property int|null $pokemon_species_id
 * @property string|null $custom_name
 *
 * @property Box $box
 * @property Move[] $moves
 * @property PokemonMove[] $pokemonMoves
 * @property PokemonSpecies $pokemonSpecies
 * @property Team $team
 */
class PokemonInstance extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pokemon_instances}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_id', 'box_id', 'pokemon_species_id', 'custom_name'], 'default', 'value' => null],
            [['team_id', 'box_id', 'pokemon_species_id'], 'integer'],
            [['custom_name'], 'string', 'max' => 255],
            [['box_id'], 'exist', 'skipOnError' => true, 'targetClass' => Box::class, 'targetAttribute' => ['box_id' => 'id']],
            [['pokemon_species_id'], 'exist', 'skipOnError' => true, 'targetClass' => PokemonSpecies::class, 'targetAttribute' => ['pokemon_species_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::class, 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_id' => 'Team ID',
            'box_id' => 'Box ID',
            'pokemon_species_id' => 'Pokemon Species ID',
            'custom_name' => 'Custom Name',
        ];
    }

    /**
     * Gets query for [[Box]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBox()
    {
        return $this->hasOne(Box::class, ['id' => 'box_id']);
    }

    /**
     * Gets query for [[Moves]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMoves()
    {
        return $this->hasMany(Move::class, ['id' => 'move_id'])->viaTable('pokemon_moves', ['pokemon_instance_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonMoves]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonMoves()
    {
        return $this->hasMany(PokemonMove::class, ['pokemon_instance_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonSpecies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonSpecies()
    {
        return $this->hasOne(PokemonSpecies::class, ['id' => 'pokemon_species_id']);
    }

    /**
     * Gets query for [[Team]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::class, ['id' => 'team_id']);
    }

}
