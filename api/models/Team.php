<?php

namespace app\models;

use app\db\ActiveRecord;
use app\validators\BlankNewItemValidator;

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

    /**
     * {@inheritdoc}
     */
    public static function tableNameSingular(): string
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'name', 'created_at', 'category_id'], 'safe'],
            [['name'], 'trim'],
            [['name'], BlankNewItemValidator::class],
        ];
    }
}
