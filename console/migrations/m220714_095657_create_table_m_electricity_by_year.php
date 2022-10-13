<?php

use yii\db\Migration;

class m220714_095657_create_table_m_electricity_by_year extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_electricity_by_year}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'generated_per_year' => $this->string(45)->comment('generated KW per year'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_electricity_by_year_compliance1_idx', '{{%m_electricity_by_year}}', ['compliance_id']);
        $this->createIndex('fk_m_electricity_by_year_title_has_monitoring1_idx', '{{%m_electricity_by_year}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_electricity_by_year_compliance1',
            '{{%m_electricity_by_year}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_electricity_by_year}}');
    }
}
