<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m251111_144426_add_auth_columns_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('{{%users}}', 'username', $this->string()->notNull()->unique());
        $this->addColumn('{{%users}}', 'password', $this->string()->notNull());
        $this->addColumn('{{%users}}', 'auth_key', $this->string()->notNull()->unique());
        $this->addColumn('{{%users}}', 'email', $this->string()->unique());
        $this->addColumn('{{%users}}', 'created_at', $this->bigInteger()->notNull());
        $this->addColumn('{{%users}}', 'updated_at', $this->bigInteger()->notNull());

        $this->createIndex('idx-users-username', '{{%users}}', 'username', true);
        $this->createIndex('idx-users-email', '{{%users}}', 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropIndex('idx-users-username', '{{%users}}');
        $this->dropIndex('idx-users-email', '{{%users}}');

        $this->dropColumn('{{%users}}', 'username');
        $this->dropColumn('{{%users}}', 'password');
        $this->dropColumn('{{%users}}', 'auth_key');
        $this->dropColumn('{{%users}}', 'email');
        $this->dropColumn('{{%users}}', 'created_at');
        $this->dropColumn('{{%users}}', 'updated_at');
    }
}
