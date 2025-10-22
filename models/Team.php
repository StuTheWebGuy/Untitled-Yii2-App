<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teams".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 *
 * @property PokemonInstance[] $pokemonInstances
 */
class Team extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%teams}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        /** @todo add category id relation & rules */
        return [
            [['category_id'], 'default', 'value' => null],
            [['category_id'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[PokemonInstances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonInstances()
    {
        return $this->hasMany(PokemonInstance::class, ['team_id' => 'id']);
    }

}
