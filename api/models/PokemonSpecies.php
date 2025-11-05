<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property string $name
 * @property string $url
 */
class PokemonSpecies extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%pokemon_species}}';
    }

    // todo: add validation
}
