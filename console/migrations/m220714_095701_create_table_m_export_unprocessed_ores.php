<?php

use yii\db\Migration;

class m220714_095701_create_table_m_export_unprocessed_ores extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_export_unprocessed_ores}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_has_export_inprocessed' => $this->tinyInteger()->comment('Is has export un processed'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign key from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign key from relation table monitoirng'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign key from relation table compliane'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_export_unprocessed_compliance1_idx', '{{%m_export_unprocessed_ores}}', ['compliance_id']);
        $this->createIndex('fk_m_export_unprocessed_title_has_monitoring1_idx', '{{%m_export_unprocessed_ores}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_export_unprocessed_compliance1',
            '{{%m_export_unprocessed_ores}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_export_unprocessed_ores}}');
    }
}
