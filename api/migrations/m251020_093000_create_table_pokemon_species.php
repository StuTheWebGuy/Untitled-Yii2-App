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
    public function safeUp(): void
    {
        $this->createTable('{{%pokemon_species}}', [
            'id' => $this->primaryKey(),

            'image' => $this->string(255)->defaultValue(''), // todo: add a default image
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull()->unique(),
            'created_at' => $this->bigInteger()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%pokemon_species}}');
    }
}
