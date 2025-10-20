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
    public function safeUp()
    {
        $this->createTable('{{%boxes}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),

            'name' => $this->string(255)->notNull(),
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
            'CASCADE', // Not sure whether deleting a category should delete the boxes inside
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-boxes-category_id', '{{%boxes}}');
        $this->dropTable('{{%boxes}}');
    }
}
