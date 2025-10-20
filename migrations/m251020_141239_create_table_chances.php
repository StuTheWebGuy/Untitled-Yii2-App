<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chances}}`
 *
 * stores percent chances, used for building move identities
 */
class m251020_141239_create_table_chances extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chances}}', [
            'id' => $this->primaryKey(),

            'percent_chance' => $this->integer(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chances}}');
    }
}
