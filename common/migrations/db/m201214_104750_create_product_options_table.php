<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_options}}`.
 */
class m201214_104750_create_product_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_options}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11),
            'color' => $this->string(),
            'price' => $this->decimal(9,2),
        ]);
        $this->addForeignKey(
            'fk_product_options_product_id',
            '{{%product_options}}',
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
        $this->dropTable('{{%product_options}}');
    }
}
