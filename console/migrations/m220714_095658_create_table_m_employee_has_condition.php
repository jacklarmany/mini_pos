<?php

use yii\db\Migration;

class m220714_095658_create_table_m_employee_has_condition extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_employee_has_condition}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_condition' => $this->tinyInteger()->comment('Is condition'),
                'condition_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table condition type'),
                'm_condition_for_employee_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table condition for employee'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_employee_has_condition_condition_type1_idx', '{{%m_employee_has_condition}}', ['condition_type_id']);
        $this->createIndex('fk_m_employee_has_condition_m_condition_for_employee1_idx', '{{%m_employee_has_condition}}', ['m_condition_for_employee_id']);
        $this->createIndex('id_UNIQUE', '{{%m_employee_has_condition}}', ['id'], true);

        $this->addForeignKey(
            'fk_employee_has_condition_condition_type1',
            '{{%m_employee_has_condition}}',
            ['condition_type_id'],
            '{{%m_condition_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_employee_has_condition_m_condition_for_employee1',
            '{{%m_employee_has_condition}}',
            ['m_condition_for_employee_id'],
            '{{%m_condition_for_employee}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_employee_has_condition}}');
    }
}
