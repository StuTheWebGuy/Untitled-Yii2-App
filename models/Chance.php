<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chances".
 *
 * @property int $id
 * @property int|null $percent_chance
 *
 * @property MovesEffect[] $movesEffects
 */
class Chance extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chances}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percent_chance'], 'default', 'value' => null],
            [['percent_chance'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'percent_chance' => 'Percent Chance',
        ];
    }

    /**
     * Gets query for [[MovesEffects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMovesEffects()
    {
        return $this->hasMany(MovesEffect::class, ['chance_id' => 'id']);
    }

}
