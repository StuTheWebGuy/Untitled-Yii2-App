<?php

namespace app\models;

use app\db\ActiveRecord;

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
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%pokemon_instances}}';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableNameSingular(): string
    {
        return 'pokemon instance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['team_id', 'box_id', 'created_at', 'pokemon_species_id', 'format_id', 'custom_name'], 'safe'],
            // todo: validate for box_id XOR team_id
        ];
    }
}
