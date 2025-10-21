<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pokemon_types".
 *
 * @property int $type_id
 * @property int $pokemon_species_id
 *
 * @property PokemonSpecy $pokemonSpecies
 * @property Type $type
 * @property Type $type0
 */
class PokemonType extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pokemon_types}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'pokemon_species_id'], 'required'],
            [['type_id', 'pokemon_species_id'], 'integer'],
            [['type_id', 'pokemon_species_id'], 'unique', 'targetAttribute' => ['type_id', 'pokemon_species_id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
            [['pokemon_species_id'], 'exist', 'skipOnError' => true, 'targetClass' => PokemonSpecy::class, 'targetAttribute' => ['pokemon_species_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'pokemon_species_id' => 'Pokemon Species ID',
        ];
    }

    /**
     * Gets query for [[PokemonSpecies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonSpecies()
    {
        return $this->hasOne(PokemonSpecy::class, ['id' => 'pokemon_species_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

}
