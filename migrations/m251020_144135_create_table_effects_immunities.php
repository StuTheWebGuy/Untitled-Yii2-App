<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%effects_immunities}}`
 *
 * junction: links `{{%effects}}` and `{{%immunities}}`
 */
class m251020_144135_create_table_effects_immunities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%effects_immunities}}', [
            'effect_id' => $this->integer()->notNull(),
            'immunity_id' => $this->integer()->notNull(),
            'PRIMARY KEY (effect_id, immunity_id)',
        ]);

        /**
         * effect_id FK
         */
        $this->addForeignKey(
            'fk-effects_immunities-effect_id',
            '{{%effects_immunities}}',
            'effect_id',
            '{{%effects}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        /**
         * immunity_id FK
         */
        $this->addForeignKey(
            'fk-effects_immunities-immunity_id',
            '{{%effects_immunities}}',
            'immunity_id',
            '{{%immunities}}',
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
        $this->dropTable('{{%effects_immunities}}');
        $this->dropForeignKey('fk-effects_immunities-effect_id', '{{%effects_immunities}}');
        $this->dropForeignKey('fk-effects_immunities-immunity_id', '{{%effects_immunities}}');
    }
}
