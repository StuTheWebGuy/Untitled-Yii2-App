<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class PokemonSpecies
 *
 * Represents a pokemon_species record in the database.
 *
 * @property int $id
 * @property int $images_collection_id
 * @property string $name
 * @property string url
 */
class PokemonSpecies extends ActiveRecord
{
    /**
     * @inheritdoc
     * @return string table name
     */
    public static function tableName(): string
    {
        return '{{%pokemon_species}}';
    }

    // todo: add validation
}
