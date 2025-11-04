<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`
 *
 * stores boxes and teams
 */
class m251020_090412_create_table_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),

            'name' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        /**
         * user_id FK
         */
        $this->addForeignKey(
            'fk-categories-user_id',
            '{{%categories}}',
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
        $this->dropForeignKey('fk-categories-user_id', '{{%categories}}');
        $this->dropTable('{{%categories}}');
    }
}
