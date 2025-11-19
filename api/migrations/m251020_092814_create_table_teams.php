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
    public function safeUp(): void
    {
        $this->createTable('{{%teams}}', [
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
            'fk-teams-category_id',
            '{{%teams}}',
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
            'fk-teams-user_id',
            '{{%teams}}',
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
        $this->dropForeignKey('fk-teams-category_id', '{{%teams}}');
        $this->dropForeignKey('fk-teams-user_id', '{{%teams}}');
        $this->dropTable('{{%teams}}');
    }
}
