<?php

use yii\db\Migration;

class m220714_095721_create_table_m_plan_after_project_ended extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_plan_after_project_ended}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_plan_after_project_ended' => $this->tinyInteger()->comment('Is rehabilitation plan after the project ended'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_plan_after_project_ended_compliance1_idx', '{{%m_plan_after_project_ended}}', ['compliance_id']);
        $this->createIndex('fk_m_plan_after_project_ended_title_has_monitoring1_idx', '{{%m_plan_after_project_ended}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_plan_after_project_ended_compliance1',
            '{{%m_plan_after_project_ended}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_plan_after_project_ended}}');
    }
}
