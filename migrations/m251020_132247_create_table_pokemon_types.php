<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pokemon_types}}`
 *
 * junction: links `{{%types}}` and `{{%pokemon_species}}`
 *
 * stores type of each pokemon (some pokemon require two)
 */
class m251020_132247_create_table_pokemon_types extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pokemon_types}}', [
            'type_id' => $this->integer()->notNull(),
            'pokemon_species_id' => $this->integer()->notNull(),
            'PRIMARY KEY (type_id, pokemon_species_id)',
        ]);

        /**
         * type_id FK
         */
        $this->addForeignKey(
            'fk-pokemon_types-type_id',
            '{{%pokemon_types}}',
            'type_id',
            '{{%types}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * pokemon_species FK
         */
        $this->addForeignKey(
            'fk-pokemon_types-pokemon_species_id',
            '{{%pokemon_types}}',
            'pokemon_species_id',
            '{{%pokemon_species}}',
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
        $this->dropTable('{{%pokemon_types}}');
        $this->dropForeignKey('fk-pokemon_types-type_id', '{{%pokemon_types}}');
        $this->dropForeignKey('fk-pokemon_types-pokemon_species_id', '{{%pokemon_types}}');
    }
}
