<?php

use yii\db\Migration;

class m220714_095704_create_table_m_grievance extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_grievance}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_grivance' => $this->tinyInteger()->comment('Is grievance'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_grivevance_compliance1_idx', '{{%m_grievance}}', ['compliance_id']);
        $this->createIndex('fk_m_grivevance_title_has_monitoring1_idx', '{{%m_grievance}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_grivevance_compliance1',
            '{{%m_grievance}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_grievance}}');
    }
}
