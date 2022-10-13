<?php

use yii\db\Migration;

class m220714_095652_create_table_m_company_have_insurace extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_company_have_insurace}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_company_have_insuracel' => $this->tinyInteger()->comment('company has insurance '),
                'ref_document' => $this->tinyInteger()->comment('has reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('compliance ID is foreign key from relation table compliance'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('TitleID is foreign key from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Monitoring ID is foreign key from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_company_have_insurace_compliance1_idx', '{{%m_company_have_insurace}}', ['compliance_id']);
        $this->createIndex('fk_m_company_have_insurace_title_has_monitoring1_idx', '{{%m_company_have_insurace}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_company_have_insurace_compliance1',
            '{{%m_company_have_insurace}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_company_have_insurace}}');
    }
}
