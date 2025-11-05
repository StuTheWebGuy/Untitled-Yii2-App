<?php

namespace app\models;

use yii\db\ActiveRecord;

class PokemonInstance extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%pokemon_instances}}';
    }
}
