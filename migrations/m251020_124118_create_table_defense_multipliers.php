<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%defense_multipliers}}`
 *
 * junction: dual reference to `{{%types}}`
 *
 * stores the multipliers applied when defending, with relation to the types of the pokemon involved
 */
class m251020_124118_create_table_defense_multipliers extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%defense_multipliers}}', [
            'user_type_id' => $this->integer()->notNull(),
            'opponent_type_id' => $this->integer()->notNull(),
            'PRIMARY KEY (user_type_id, opponent_type_id)',

            'multiplier' => $this->integer()->notNull()->defaultValue(1),
        ]);

        /**
         * user type_id FK
         *
         * points to the defender's type (user)
         */
        $this->addForeignKey(
            'fk-defense_multipliers-type_id-user',
            '{{%defense_multipliers}}',
            'user_type_id',
            '{{%types}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * opponent type_id FK
         *
         * points to the attacker's type (opponent)
         */
        $this->addForeignKey(
            'fk-defense_multipliers-type_id-opponent',
            '{{%defense_multipliers}}',
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
        $this->dropTable('{{%defense_multipliers}}');
        $this->dropForeignKey('fk-defense_multipliers-type_id-user', '{{%defense_multipliers}}');
        $this->dropForeignKey('fk-defense_multipliers-type_id-opponent', '{{%defense_multipliers}}');
    }
}
