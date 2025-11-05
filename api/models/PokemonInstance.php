<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class PokemonInstances
 *
 * Represents a pokemon_instances record in the database.
 *
 * @property int $id
 * @property int $team_id
 * @property int $box_id
 * @property int $pokemon_species_id
 * @property int $format_id
 * @property string $custom_name
 */
class PokemonInstance extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%pokemon_instances}}';
    }
}
