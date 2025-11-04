<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pokemon_instances}}`
 *
 * stores a pokemon instance with data about that species, and how it is specifically configured by the user
 *
 * - @todo add validation for custom constraint 'team_id XOR box_id'
 */
class m251020_093403_create_table_pokemon_instances extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%pokemon_instances}}', [
            'id' => $this->primaryKey(),
            'team_id' => $this->integer(),
            'box_id' => $this->integer(),
            'pokemon_species_id' => $this->integer(),
            'format_id' => $this->integer(),

            'custom_name' => $this->string(255),
        ]);

        /**
         * box_id FK
         */
        $this->addForeignKey(
            'fk-pokemon_instances-box_id',
            '{{%pokemon_instances}}',
            'box_id',
            '{{%boxes}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * team_id FK
         */
        $this->addForeignKey(
            'fk-pokemon_instances-team_id',
            '{{%pokemon_instances}}',
            'team_id',
            '{{%teams}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * pokemon_species_id FK
         */
        $this->addForeignKey(
            'fk-pokemon_instances-pokemon_species_id',
            '{{%pokemon_instances}}',
            'pokemon_species_id',
            '{{%pokemon_species}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * format_id FK
         */
        $this->addForeignKey(
            'fk-pokemon_instances-format_id',
            '{{%pokemon_instances}}',
            'format_id',
            '{{%formats}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropForeignKey('fk-pokemon_instances-box_id', '{{%pokemon_instances}}');
        $this->dropForeignKey('fk-pokemon_instances-team_id', '{{%pokemon_instances}}');
        $this->dropForeignKey('fk-pokemon_instances-pokemon_species_id', '{{%pokemon_instances}}');
        $this->dropForeignKey('fk-pokemon_instances-format_id', '{{%pokemon_instances}}');
        $this->dropTable('{{%pokemon_instances}}');
    }
}
