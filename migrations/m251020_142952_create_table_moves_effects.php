<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%moves_effects}}`
 *
 * junction: links `{{%effects}}` & `{{%chances}}` to a row in `{{%moves}}`
 */
class m251020_142952_create_table_moves_effects extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%moves_effects}}', [
            'move_id' => $this->integer()->notNull(),
            'effect_id' => $this->integer()->notNull(),
            'chance_id' => $this->integer()->notNull(),
            'PRIMARY KEY (move_id, effect_id, chance_id)',
        ]);

        /**
         * move_id FK
         */
        $this->addForeignKey(
            'fk-moves_effects-move_id',
            '{{%moves_effects}}',
            'move_id',
            '{{%moves}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * effect_id FK
         */
        $this->addForeignKey(
            'fk-moves_effects-effect_id',
            '{{%moves_effects}}',
            'effect_id',
            '{{%effects}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * chance_id FK
         */
        $this->addForeignKey(
            'fk-moves_effects-chance_id',
            '{{%moves_effects}}',
            'chance_id',
            '{{%chances}}',
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
        $this->dropTable('{{%moves_effects}}');
        $this->dropForeignKey('fk-moves_effects-move_id', '{{%moves_effects}}');
        $this->dropForeignKey('fk-moves_effects-effect_id', '{{%moves_effects}}');
        $this->dropForeignKey('fk-moves_effects-chance_id', '{{%moves_effects}}');
    }
}
