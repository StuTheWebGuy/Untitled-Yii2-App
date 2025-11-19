<?php

namespace app\models;

use app\validators\BlankNewItemValidator;

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
class Category extends \app\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableNameSingular(): string
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'name', 'created_at'], 'safe'],
            [['name'], 'trim'],
            [['name'], BlankNewItemValidator::class],
        ];
    }
}
