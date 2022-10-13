<?php

use yii\db\Migration;

class m220714_095739_create_table_m_sale_item_agri extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_sale_item_agri}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'export_product' => $this->text()->comment('Export product'),
                'quantity' => $this->string(45)->comment('Quantity'),
                'value' => $this->decimal(12, 2)->comment('Value($)'),
                'country_id' => $this->integer()->comment('Is foreign key from relation table country'),
                'm_sale_agri_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table sale agriculture'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_sale_item_agri_country1_idx', '{{%m_sale_item_agri}}', ['country_id']);
        $this->createIndex('fk_m_sale_item_agri_m_sale_agri1_idx', '{{%m_sale_item_agri}}', ['m_sale_agri_id']);

        $this->addForeignKey(
            'fk_m_sale_item_agri_country1',
            '{{%m_sale_item_agri}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_sale_item_agri_m_sale_agri1',
            '{{%m_sale_item_agri}}',
            ['m_sale_agri_id'],
            '{{%m_sale_agri}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_sale_item_agri}}');
    }
}
