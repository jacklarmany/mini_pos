<?php

use yii\db\Migration;

class m220714_095802_create_table_m_total_employee_project extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_total_employee_project}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'lao' => $this->integer()->comment('Employee total lao'),
                'female_lao' => $this->integer()->comment('Employee total female'),
                'foreign' => $this->integer()->comment('Employee total foreign'),
                'foreign_female' => $this->integer()->comment('Employee total female foreign'),
                'm_total_employee_project_has_compliance_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table total employee project has compliance'),
                'm_type_employment_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table 
        type emploment'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_total_employee_project_m_type_employment1_idx', '{{%m_total_employee_project}}', ['m_type_employment_id']);
        $this->createIndex('fk_total_employee_project_m_total_employee_project_has_comp_idx', '{{%m_total_employee_project}}', ['m_total_employee_project_has_compliance_id']);

        $this->addForeignKey(
            'fk_m_total_employee_project_m_type_employment1',
            '{{%m_total_employee_project}}',
            ['m_type_employment_id'],
            '{{%m_type_employment}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_total_employee_project_m_total_employee_project_has_compli1',
            '{{%m_total_employee_project}}',
            ['m_total_employee_project_has_compliance_id'],
            '{{%m_total_employee_project_has_compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_total_employee_project}}');
    }
}
