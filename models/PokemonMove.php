<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pokemon_moves".
 *
 * @property int $move_id
 * @property int $pokemon_instance_id
 *
 * @property Move $move
 * @property PokemonInstance $pokemonInstance
 */
class PokemonMove extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pokemon_moves}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['move_id', 'pokemon_instance_id'], 'required'],
            [['move_id', 'pokemon_instance_id'], 'integer'],
            [['move_id', 'pokemon_instance_id'], 'unique', 'targetAttribute' => ['move_id', 'pokemon_instance_id']],
            [['move_id'], 'exist', 'skipOnError' => true, 'targetClass' => Move::class, 'targetAttribute' => ['move_id' => 'id']],
            [['pokemon_instance_id'], 'exist', 'skipOnError' => true, 'targetClass' => PokemonInstance::class, 'targetAttribute' => ['pokemon_instance_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'move_id' => 'Move ID',
            'pokemon_instance_id' => 'Pokemon Instance ID',
        ];
    }

    /**
     * Gets query for [[Move]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMove()
    {
        return $this->hasOne(Move::class, ['id' => 'move_id']);
    }

    /**
     * Gets query for [[PokemonInstance]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonInstance()
    {
        return $this->hasOne(PokemonInstance::class, ['id' => 'pokemon_instance_id']);
    }

}
