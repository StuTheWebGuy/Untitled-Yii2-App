<?php

namespace app\models;

use yii\db\ActiveRecord;

class Team extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%teams}}';
    }
}
