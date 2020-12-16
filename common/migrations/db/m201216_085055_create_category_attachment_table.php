<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_attachment}}`.
 */
class m201216_085055_create_category_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_attachment}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'path' => $this->string(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer(),
        ]);
        $this->addForeignKey(
            'fk_category_attachment_category_id',
            '{{%category_attachment}}',
            'category_id',
            '{{%category}}',
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
        $this->dropTable('{{%category_attachment}}');
    }
}
