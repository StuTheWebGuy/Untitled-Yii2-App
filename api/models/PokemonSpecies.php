<?php

namespace app\models;

use app\db\ActiveRecord;

/**
 * Class PokemonSpecies
 *
 * Represents a pokemon_species record in the database.
 *
 * @property int $id
 * @property int $images_collection_id
 * @property string $name
 * @property string $url
 * @property string image
 */
class PokemonSpecies extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%pokemon_species}}';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableNameSingular(): string
    {
        return 'pokemon species';
    }

    // todo: add validation
}
