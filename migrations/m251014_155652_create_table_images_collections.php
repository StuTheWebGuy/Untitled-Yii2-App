<?php

use yii\db\Migration;


/**
 * Handles the creation of table `{{%images_collection}}`
 *
 * stores image URLs in different formats for icons etc
 */
class m251014_155652_create_table_images_collections extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images_collections}}', [
            'id' => $this->primaryKey(),

            'alt' => $this->string(255)->notNull()->defaultValue('Image Not Found'),
            'image16' => $this->text(),
            'image32' => $this->text(),
            'image64' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-pokemon_species-images_collection_id', '{{%pokemon_species}}');
        $this->dropTable('{{%pokemon_species}}');
    }
}
