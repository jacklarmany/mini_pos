<?php

use yii\db\Migration;

class m220714_095730_create_table_m_product_type_item_agri extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_product_type_item_agri}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'contract_2_3' => $this->string(45)->comment('Contract 2+3'),
                'contract_4_1' => $this->string(45)->comment('Contract 4+1'),
                'purchase_only' => $this->string(45)->comment('Purchase only'),
                'agricultural_product_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table agriculture product'),
                'm_prodduct_contract_farming_agri_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table product contract farming agriculture'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_product_type_item_agricultural_product1_idx', '{{%m_product_type_item_agri}}', ['agricultural_product_id']);
        $this->createIndex('fk_product_type_item_m_prodduct_contract_farming_agri1_idx', '{{%m_product_type_item_agri}}', ['m_prodduct_contract_farming_agri_id']);

        $this->addForeignKey(
            'fk_product_type_item_agricultural_product1',
            '{{%m_product_type_item_agri}}',
            ['agricultural_product_id'],
            '{{%agricultural_product}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_product_type_item_m_prodduct_contract_farming_agri1',
            '{{%m_product_type_item_agri}}',
            ['m_prodduct_contract_farming_agri_id'],
            '{{%m_prodduct_contract_farming_agri}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_product_type_item_agri}}');
    }
}
