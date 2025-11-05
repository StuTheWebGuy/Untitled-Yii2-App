<?php

namespace app\models;

use yii\db\ActiveRecord;

class Box extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%boxes}}';
    }
}
