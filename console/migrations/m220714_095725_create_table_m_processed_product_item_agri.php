<?php

use yii\db\Migration;

class m220714_095725_create_table_m_processed_product_item_agri extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_processed_product_item_agri}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'product_name' => $this->string()->comment('Product item name'),
                'value_ton' => $this->string(45)->comment('Volume (Ton)'),
                'm_processed_product_agri_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_processed_product_item_agri_m_processed_product_agri1_idx', '{{%m_processed_product_item_agri}}', ['m_processed_product_agri_id']);

        $this->addForeignKey(
            'fk_m_processed_product_item_agri_m_processed_product_agri1',
            '{{%m_processed_product_item_agri}}',
            ['m_processed_product_agri_id'],
            '{{%m_processed_product_agri}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_processed_product_item_agri}}');
    }
}
