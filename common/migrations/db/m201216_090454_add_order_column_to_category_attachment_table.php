<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%category_attachment}}`.
 */
class m201216_090454_add_order_column_to_category_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category_attachment}}', 'order', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%category_attachment}}', 'order');
    }
}
