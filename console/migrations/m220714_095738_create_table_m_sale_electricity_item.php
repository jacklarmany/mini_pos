<?php

use yii\db\Migration;

class m220714_095738_create_table_m_sale_electricity_item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_sale_electricity_item}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'electri_generate_kw' => $this->string(45)->comment('Electricity generated (KW)'),
                'unit_price' => $this->string(45)->comment('Unit price ($)'),
                'percentage' => $this->string(45)->comment('Electricity generated in percentage(%) of the project life'),
                'm_sale_electricity_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table sale electricity'),
                'country_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table country'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_sale_electricity_item_country1_idx', '{{%m_sale_electricity_item}}', ['country_id']);
        $this->createIndex('fk_m_sale_electricity_item_m_sale_electricity1_idx', '{{%m_sale_electricity_item}}', ['m_sale_electricity_id']);

        $this->addForeignKey(
            'fk_m_sale_electricity_item_country1',
            '{{%m_sale_electricity_item}}',
            ['country_id'],
            '{{%country}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_sale_electricity_item_m_sale_electricity1',
            '{{%m_sale_electricity_item}}',
            ['m_sale_electricity_id'],
            '{{%m_sale_electricity}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_sale_electricity_item}}');
    }
}
