<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_attachment}}`.
 */
class m201216_141607_create_product_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_attachment}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'path' => $this->string(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer(),
            'order' => $this->integer(),
        ]);
        $this->addForeignKey(
            'fk_product_attachment_product_id',
            '{{%product_attachment}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_attachment}}');
    }
}
