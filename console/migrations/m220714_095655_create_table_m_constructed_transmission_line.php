<?php

use yii\db\Migration;

class m220714_095655_create_table_m_constructed_transmission_line extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_constructed_transmission_line}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_has_constructed_transmission_line' => $this->tinyInteger()->comment('is has constructed transmission line'),
                'constructed_company' => $this->string()->comment('Company'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Compliance ID is foreign key from relation table compliance '),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Title ID is foreign key from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Monitoring ID is foreign key from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_constructed_transmission_line_compliance1_idx', '{{%m_constructed_transmission_line}}', ['compliance_id']);
        $this->createIndex('fk_m_constructed_transmission_line_title_has_monitoring1_idx', '{{%m_constructed_transmission_line}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_constructed_transmission_line_compliance1',
            '{{%m_constructed_transmission_line}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_constructed_transmission_line}}');
    }
}
