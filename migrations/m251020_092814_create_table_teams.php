<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teams}}`
 *
 * stores a set quantity of pokemon instances (6)
 */
class m251020_092814_create_table_teams extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teams}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),

            'name' => $this->string(255)->notNull(),
        ]);

        /**
         * category_id FK
         */
        $this->addForeignKey(
            'fk-teams-category_id',
            '{{%boxes}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE', // Not sure whether deleting a category should delete the teams inside
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-teams-category_id', '{{%boxes}}');
        $this->dropTable('{{%teams}}');
    }
}
