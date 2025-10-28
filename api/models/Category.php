<?php


namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%categories}}';
    }
}