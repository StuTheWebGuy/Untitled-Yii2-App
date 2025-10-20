<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%moves}}`
 *
 * stores basic data for each move
 */
class m251020_134931_create_table_moves extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%moves}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->notNull(),

            'name' => $this->string(255)->notNull(),
            'power' => $this->integer(),
            'description' => $this->text(),
            'accuracy' => $this->integer(),
        ]);

        /**
         * type_id FK
         */
        $this->addForeignKey(
            'fk-moves-type_id',
            '{{%pokemon_types}}',
            'type_id',
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
        $this->dropTable('{{%moves}}');
        $this->dropForeignKey('fk-moves-type_id', '{{%moves}}');
    }
}
