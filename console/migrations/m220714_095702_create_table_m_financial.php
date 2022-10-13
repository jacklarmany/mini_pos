<?php

use yii\db\Migration;

class m220714_095702_create_table_m_financial extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_financial}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'value' => $this->decimal(12, 2)->comment('Values'),
                'm_financial_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table financial type'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table Title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_financial_m_financial_type1_idx', '{{%m_financial}}', ['m_financial_type_id']);
        $this->createIndex('fk_m_financial_title_has_monitoring1_idx', '{{%m_financial}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_financial_m_financial_type1',
            '{{%m_financial}}',
            ['m_financial_type_id'],
            '{{%m_financial_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_financial}}');
    }
}
