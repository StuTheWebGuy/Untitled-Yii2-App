<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class ImagesCollection
 *
 * Represents an images_collection record in the database.
 *
 * @property int $id
 * @property string $alt
 * @property string $image16
 * @property string $image32
 * @property string $image64
 */
class ImagesCollection extends ActiveRecord
{
    /**
     * @inheritdoc
     * @return string table name
     */
    public static function tableName(): string
    {
        return '{{%images_collection}}';
    }
}
