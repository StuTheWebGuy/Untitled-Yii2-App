<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pokemon_species".
 *
 * @property int $id
 * @property int $images_collection_id
 * @property string $name
 * @property string $description
 *
 * @property ImagesCollection $imagesCollection
 * @property PokemonInstance[] $pokemonInstances
 * @property PokemonType[] $pokemonTypes
 * @property Type[] $types
 * @property Type[] $types0
 */
class PokemonSpecies extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pokemon_species}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['images_collection_id', 'name', 'description'], 'required'],
            [['images_collection_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['images_collection_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImagesCollection::class, 'targetAttribute' => ['images_collection_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'images_collection_id' => 'Images Collection ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[ImagesCollection]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagesCollection()
    {
        return $this->hasOne(ImagesCollection::class, ['id' => 'images_collection_id']);
    }

    /**
     * Gets query for [[PokemonInstances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonInstances()
    {
        return $this->hasMany(PokemonInstance::class, ['pokemon_species_id' => 'id']);
    }

    /**
     * Gets query for [[PokemonTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPokemonTypes()
    {
        return $this->hasMany(PokemonType::class, ['pokemon_species_id' => 'id']);
    }

    /**
     * Gets query for [[Types]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasMany(Type::class, ['id' => 'type_id'])->viaTable('pokemon_types', ['pokemon_species_id' => 'id']);
    }

    /**
     * Gets query for [[Types0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypes0()
    {
        return $this->hasMany(Type::class, ['id' => 'type_id'])->viaTable('pokemon_types', ['pokemon_species_id' => 'id']);
    }

}
