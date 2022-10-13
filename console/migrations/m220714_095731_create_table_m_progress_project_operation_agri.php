<?php

use yii\db\Migration;

class m220714_095731_create_table_m_progress_project_operation_agri extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_progress_project_operation_agri}}',
            [
                'id' => $this->primaryKey()->unsigned()->comment('Primary key of table is auto increment'),
                'approved_investment_activity' => $this->text()->comment('agriculture, mining, other concession, '),
                'approved_ref_doc' => $this->tinyInteger()->comment('Approved Reference document'),
                'approved_compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'license_by_respective_sector' => $this->tinyInteger()->comment('License by respective sector'),
                'licensed_dated' => $this->date()->comment('Licensed dated'),
                'license_ref_document' => $this->tinyInteger()->comment('License Reference document'),
                'license_compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'implement_or_not_as_planned' => $this->tinyInteger()->comment('implement or not as planned'),
                'achieved_percent' => $this->integer()->comment('Achieved percent'),
                'in_stage' => $this->string()->comment('Stage'),
                'explain' => $this->text()->comment('Use for not implemmented'),
                'implement_or_not_as_planned_ref_doc' => $this->tinyInteger()->comment('implement or not as planned has reference document'),
                'implement_or_not_as_planned_compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'land_area_agreement' => $this->string(45)->comment('Land area agreement'),
                'land_lease_agreement' => $this->string(45)->comment('Land lease agreement'),
                'land_area_used' => $this->string(45)->comment('Land area used'),
                'land_area_ref_document' => $this->tinyInteger()->comment('land area has reference document'),
                'land_area_compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'area_has_uxo' => $this->tinyInteger()->comment('Area has uxo'),
                'area_has_uxo_ref_document' => $this->tinyInteger()->comment('Area has uxo reference document'),
                'area_has_uxo_compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'finace_uxo_survey' => $this->tinyInteger()->comment('Finace uxo survey'),
                'is_yes_cleared_by_which' => $this->text()->comment('is yes cleared by which'),
                'finace_uxo_survey_ref_document' => $this->tinyInteger()->comment('finace uxo survey has reference document'),
                'finace_uxo_survey_compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'area_total_uxo' => $this->string(45)->comment('Area total uxo'),
                'area_total_clear_uxo' => $this->string(45)->comment('Area total clear uxo'),
                'area_total_uxo_ref_document' => $this->tinyInteger()->comment('Area total uxo has reference document'),
                'area_total_uxo_compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'area_of_operation' => $this->string()->comment('Area of operation'),
                'area_of_operation_ref_document' => $this->tinyInteger()->comment('Area of operation has reference document'),
                'area_of_operation_compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_progress_project_operation_agri_compliance1_idx', '{{%m_progress_project_operation_agri}}', ['finace_uxo_survey_compliance_id']);
        $this->createIndex('fk_m_progress_project_operation_agri_compliance2_idx', '{{%m_progress_project_operation_agri}}', ['area_of_operation_compliance_id']);
        $this->createIndex('fk_progress_compliance1_idx', '{{%m_progress_project_operation_agri}}', ['approved_compliance_id']);
        $this->createIndex('fk_progress_compliance2_idx', '{{%m_progress_project_operation_agri}}', ['license_compliance_id']);
        $this->createIndex('fk_progress_compliance3_idx', '{{%m_progress_project_operation_agri}}', ['implement_or_not_as_planned_compliance_id']);
        $this->createIndex('fk_progress_compliance4_idx', '{{%m_progress_project_operation_agri}}', ['land_area_compliance_id']);
        $this->createIndex('fk_progress_compliance5_idx', '{{%m_progress_project_operation_agri}}', ['area_has_uxo_compliance_id']);
        $this->createIndex('fk_progress_compliance6_idx', '{{%m_progress_project_operation_agri}}', ['area_total_uxo_compliance_id']);
        $this->createIndex('fk_progress_title_has_monitoring1_idx', '{{%m_progress_project_operation_agri}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_progress_project_operation_agri_compliance1',
            '{{%m_progress_project_operation_agri}}',
            ['finace_uxo_survey_compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_progress_project_operation_agri_compliance2',
            '{{%m_progress_project_operation_agri}}',
            ['area_of_operation_compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_progress_compliance1',
            '{{%m_progress_project_operation_agri}}',
            ['approved_compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_progress_compliance2',
            '{{%m_progress_project_operation_agri}}',
            ['license_compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_progress_compliance3',
            '{{%m_progress_project_operation_agri}}',
            ['implement_or_not_as_planned_compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_progress_compliance4',
            '{{%m_progress_project_operation_agri}}',
            ['land_area_compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_progress_compliance5',
            '{{%m_progress_project_operation_agri}}',
            ['area_has_uxo_compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_progress_compliance6',
            '{{%m_progress_project_operation_agri}}',
            ['area_total_uxo_compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_progress_project_operation_agri}}');
    }
}
