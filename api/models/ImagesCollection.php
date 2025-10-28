<?php


namespace app\models;

use yii\db\ActiveRecord;

class ImagesCollection extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%images_collection}}';
    }
}