<?php


namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%categories}}';
    }

    public function rules(): array
    {
        return [
            [
                ['user_id', 'name', 'created_at'],
                'safe'
            ],
        ];
    }
}