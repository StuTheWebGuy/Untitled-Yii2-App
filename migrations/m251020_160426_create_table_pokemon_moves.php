<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pokemon_moves}}`
 *
 * junction: links `{{%moves}}` to a `{{%pokemon}}`
 */
class m251020_160426_create_table_pokemon_moves extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pokemon_moves}}', [
            'move_id' => $this->integer()->notNull(),
            'pokemon_instance_id' => $this->integer()->notNull(),
            'PRIMARY KEY (move_id, pokemon_instance_id)',
        ]);

        /**
         * effect_id FK
         */
        $this->addForeignKey(
            'fk-pokemon_moves-move_id',
            '{{%pokemon_moves}}',
            'move_id',
            '{{%moves}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * immunity_id FK
         */
        $this->addForeignKey(
            'fk-pokemon_moves-pokemon_instance_id',
            '{{%pokemon_moves}}',
            'pokemon_instance_id',
            '{{%pokemon_instances}}',
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
        $this->dropTable('{{%pokemon_moves}}');
        $this->dropForeignKey('fk-pokemon_moves-move_id', '{{%pokemon_moves}}');
        $this->dropForeignKey('fk-pokemon_moves-pokemon_instance_id', '{{%pokemon_moves}}');
    }
}
