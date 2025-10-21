<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%effects}}`
 *
 * stores an enum lookup index for an effect
 */
class m251020_141944_create_table_effects extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%effects}}', [
            'id' => $this->primaryKey(),

            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%effects}}');
    }
}
