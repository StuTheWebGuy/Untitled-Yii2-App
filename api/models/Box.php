<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Box
 *
 * Represents a boxes record in the database.
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 */
class Box extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%boxes}}';
    }
}
