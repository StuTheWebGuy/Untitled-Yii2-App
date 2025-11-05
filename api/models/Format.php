<?php

namespace app\models;

use yii\db\ActiveRecord;

class Format extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%formats}}';
    }
}
