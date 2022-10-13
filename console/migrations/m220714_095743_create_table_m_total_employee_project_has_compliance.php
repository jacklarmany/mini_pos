<?php

use yii\db\Migration;

class m220714_095743_create_table_m_total_employee_project_has_compliance extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_total_employee_project_has_compliance}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_total_employee_project_has_compliance_compliance1_idx', '{{%m_total_employee_project_has_compliance}}', ['compliance_id']);
        $this->createIndex('fk_m_total_employee_project_has_compliance_title_has_monito_idx', '{{%m_total_employee_project_has_compliance}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_total_employee_project_has_compliance_compliance1',
            '{{%m_total_employee_project_has_compliance}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_total_employee_project_has_compliance}}');
    }
}
