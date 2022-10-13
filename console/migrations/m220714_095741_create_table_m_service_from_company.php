<?php

use yii\db\Migration;

class m220714_095741_create_table_m_service_from_company extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_service_from_company}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'company_number' => $this->integer()->comment('Number compapy'),
                'value' => $this->decimal(23, 2)->comment('Value ($)'),
                'm_service_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table service type'),
                'm_service_company_doc_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table service company doc'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_service_from_company_m_service_company_doc1_idx', '{{%m_service_from_company}}', ['m_service_company_doc_id']);
        $this->createIndex('fk_m_service_from_company_m_service_type1_idx', '{{%m_service_from_company}}', ['m_service_type_id']);

        $this->addForeignKey(
            'fk_m_service_from_company_m_service_company_doc1',
            '{{%m_service_from_company}}',
            ['m_service_company_doc_id'],
            '{{%m_service_company_doc}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_service_from_company_m_service_type1',
            '{{%m_service_from_company}}',
            ['m_service_type_id'],
            '{{%m_service_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_service_from_company}}');
    }
}
