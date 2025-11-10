<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Team
 *
 * Represents a teams record in the database.
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 */
class Team extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%teams}}';
    }
}
