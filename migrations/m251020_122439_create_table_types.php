<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%types}}`
 *
 * stores a single type (e.g. fire, water, etc)
 */
class m251020_122439_create_table_types extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%types}}', [
            'id' => $this->primaryKey(),
            'images_collection_id' => $this->integer()->notNull(),

            'name' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%types}}');
    }
}
