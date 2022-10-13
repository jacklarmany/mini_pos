<?php

use yii\db\Migration;

class m220714_095747_create_table_product_item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product_item}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'qauntity' => $this->string(45)->comment('Quantity'),
                'm_product_agri_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table product agri'),
                'agricultural_product_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table agricultural_product'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_product_item_agricultural_product1_idx', '{{%product_item}}', ['agricultural_product_id']);
        $this->createIndex('fk_product_item_m_product_agri1_idx', '{{%product_item}}', ['m_product_agri_id']);

        $this->addForeignKey(
            'fk_product_item_agricultural_product1',
            '{{%product_item}}',
            ['agricultural_product_id'],
            '{{%agricultural_product}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_product_item_m_product_agri1',
            '{{%product_item}}',
            ['m_product_agri_id'],
            '{{%m_product_agri}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%product_item}}');
    }
}
