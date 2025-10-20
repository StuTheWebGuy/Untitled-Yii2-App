<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attack_multipliers}}`
 *
 * junction: dual reference to `{{%types}}`
 *
 * stores the multipliers applied when attacking, with relation to the types of the pokemon involved
 */
class m251020_124130_create_table_attack_multipliers extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%attack_multipliers}}', [
            'user_type_id' => $this->integer()->notNull(),
            'opponent_type_id' => $this->integer()->notNull(),
            'PRIMARY KEY (user_type_id, opponent_type_id)',

            'multiplier' => $this->integer()->notNull()->defaultValue(1),
        ]);

        /**
         * user type_id FK
         *
         * points to the attacker's type (user)
         */
        $this->addForeignKey(
            'fk-attack_multipliers-type_id-user',
            '{{%attack_multipliers}}',
            'user_type_id',
            '{{%types}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * opponent type_id FK
         *
         * points to the defender's type (opponent)
         */
        $this->addForeignKey(
            'fk-attack_multipliers-type_id-opponent',
            '{{%attack_multipliers}}',
            'opponent_type_id',
            '{{%types}}',
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
        $this->dropTable('{{%attack_multipliers}}');
        $this->dropForeignKey('fk-attack_multipliers-type_id-user', '{{%attack_multipliers}}');
        $this->dropForeignKey('fk-attack_multipliers-type_id-opponent', '{{%attack_multipliers}}');
    }
}
