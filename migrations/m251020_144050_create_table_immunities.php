<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%immunities}}`
 *
 * stores a single type used in immunity checks
 */
class m251020_144050_create_table_immunities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%immunities}}', [
            'id' => $this->primaryKey(),
            'immune_type_id' => $this->integer(),
        ]);

        /**
         * type_id FK
         */
        $this->addForeignKey(
            'fk-immunities-type_id',
            '{{%immunities}}',
            'immune_type_id',
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
        $this->dropTable('{{%immunities}}');
        $this->dropForeignKey('fk-immunities-type_id', '{{%immunities}}');
    }
}
