<?php

use yii\db\Migration;

class m220714_095654_create_table_m_condition_for_employee extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_condition_for_employee}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Title ID is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Monitoring ID is foreign keys from relation table monitoring'),
                'compliance_id' => $this->integer()->unsigned()->comment('Compliance ID is foreign keys from relation table compliance'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_condition_for_employee_compliance1_idx', '{{%m_condition_for_employee}}', ['compliance_id']);
        $this->createIndex('fk_m_condition_for_employee_title_has_monitoring1_idx', '{{%m_condition_for_employee}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_condition_for_employee_compliance1',
            '{{%m_condition_for_employee}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_condition_for_employee}}');
    }
}
