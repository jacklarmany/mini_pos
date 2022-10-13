<?php

use yii\db\Migration;

class m220714_095714_create_table_m_lao_employee_promoted extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_lao_employee_promoted}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_lao_employee_promoted' => $this->tinyInteger()->comment('Is Lao employee promoted'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table complaince'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_lao_employee_promoted_compliance1_idx', '{{%m_lao_employee_promoted}}', ['compliance_id']);
        $this->createIndex('fk_m_lao_employee_promoted_title_has_monitoring1_idx', '{{%m_lao_employee_promoted}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_lao_employee_promoted_compliance1',
            '{{%m_lao_employee_promoted}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_lao_employee_promoted}}');
    }
}
