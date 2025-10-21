<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images_collections".
 *
 * @property int $id
 * @property string $alt
 * @property string|null $image16
 * @property string|null $image32
 * @property string|null $image64
 *
 * @property PokemonSpecies[] $pokemonSpecies
 */
class ImagesCollection extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%images_collections}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image16', 'image32', 'image64'], 'default', 'value' => null],
            [['alt'], 'default', 'value' => 'Image Not Found'],
            [['image16', 'image32', 'image64'], 'string'],
            [['alt'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alt' => 'Alt',
            'image16' => 'Image16',
            'image32' => 'Image32',
            'image64' => 'Image64',
        ];
    }

}
