<?php

use yii\db\Migration;

class m251020_160426_create_table_pokemon_moves extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m251020_160426_create_table_pokemon_moves cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251020_160426_create_table_pokemon_moves cannot be reverted.\n";

        return false;
    }
    */
}
