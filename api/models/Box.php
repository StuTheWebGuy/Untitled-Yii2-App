<?php

namespace app\models;

use app\db\ActiveRecord;
use app\validators\BlankNewItemValidator;

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
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%boxes}}';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableNameSingular(): string
    {
        return 'box';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['category_id', 'user_id', 'name', 'created_at'], 'safe'],
            [['name'], 'trim'],
            [['name'], BlankNewItemValidator::class],
        ];
    }
}
