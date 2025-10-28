<?php

use yii\db\Migration;


/**
 * Handles the creation of table `{{%pokemon_species}}`
 *
 * stores all pokemon species from pokeAPI
 *
 * - @todo write script to preload from pokeAPI
 *
 * @note should not be written to during runtime - only preloaded with cronjob / manually
 */
class m251020_093000_create_table_pokemon_species extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pokemon_species}}', [
            'id' => $this->primaryKey(),
            'images_collection_id' => $this->integer(),

            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull()->unique(),
        ]);

        /**
         * images_collection_id FK
         */
        $this->addForeignKey(
            'fk-pokemon_species-images_collection_id',
            '{{%pokemon_species}}',
            'images_collection_id',
            '{{%images_collections}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-pokemon_species-images_collection_id', '{{%pokemon_species}}');
        $this->dropTable('{{%pokemon_species}}');
    }
}
