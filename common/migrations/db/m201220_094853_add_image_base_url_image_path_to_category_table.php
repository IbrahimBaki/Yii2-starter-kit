<?php

use yii\db\Migration;

/**
 * Class m201220_094853_add_image_base_url_image_path_to_category_table
 */
class m201220_094853_add_image_base_url_image_path_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category}}', 'image_name', $this->string());
        $this->addColumn('{{%category}}', 'image_base_url', $this->string());
        $this->addColumn('{{%category}}', 'image_path', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%category}}', 'image');
        $this->dropColumn('{{%category}}', 'image_base_url');
        $this->dropColumn('{{%category}}', 'image_path');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201220_094853_add_image_base_url_image_path_to_category_table cannot be reverted.\n";

        return false;
    }
    */
}
