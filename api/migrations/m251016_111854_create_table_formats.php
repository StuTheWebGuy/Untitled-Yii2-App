<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%formats}}`
 *
 * link a format to its respective generation number(s)
 */
class m251016_111854_create_table_formats extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%formats}}', [
            'id' => $this->primaryKey(),

            'name' => $this->string()->notNull(),
            'abbreviation' => $this->string(),
            'max_generation' => $this->integer(),
            'min_generation' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%formats}}');
    }
}
