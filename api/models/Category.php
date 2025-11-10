<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Category
 *
 * Represents a categories record in the database.
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $created_at
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%categories}}';
    }
}
