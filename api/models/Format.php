<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Format
 *
 * Represents a formats record in the database.
 *
 * @property int $id
 * @property string $name
 * @property string $abbreviation
 * @property int $max_generation
 * @property int $min_generation
 */
class Format extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%formats}}';
    }
}
