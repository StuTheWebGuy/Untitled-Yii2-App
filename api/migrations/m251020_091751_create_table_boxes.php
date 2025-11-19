<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%boxes}}`
 *
 * Stores a large quantity of pokemon instances
 */
class m251020_091751_create_table_boxes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%boxes}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'user_id' => $this->integer(),

            'name' => $this->string(255)->notNull(),
            'created_at' => $this->bigInteger()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
        ]);

        /**
         * category_id FK
         */
        $this->addForeignKey(
            'fk-boxes-category_id',
            '{{%boxes}}',
            'category_id',
            '{{%categories}}',
            'id',
            'SET NULL',
            'CASCADE'
        );

        /**
         * user_id FK
         */
        $this->addForeignKey(
            'fk-boxes-user_id',
            '{{%boxes}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropForeignKey('fk-boxes-category_id', '{{%boxes}}');
        $this->dropForeignKey('fk-boxes-user_id', '{{%boxes}}');
        $this->dropTable('{{%boxes}}');
    }
}
