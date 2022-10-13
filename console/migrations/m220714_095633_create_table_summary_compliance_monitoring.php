<?php

use yii\db\Migration;

class m220714_095633_create_table_summary_compliance_monitoring extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%summary_compliance_monitoring}}',
            [
                'id' => $this->primaryKey(),
                'total_number' => $this->integer()->notNull()->defaultValue('0'),
                'percentage' => $this->string(225)->defaultValue('0'),
                'monitoring_id' => $this->integer()->notNull(),
                'compliance_id' => $this->integer()->unsigned()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_summary_compliance_monitoring_compliance1_idx', '{{%summary_compliance_monitoring}}', ['compliance_id']);
        $this->createIndex('fk_summary_compliance_monitoring_monitoring1_idx', '{{%summary_compliance_monitoring}}', ['monitoring_id']);

        $this->addForeignKey(
            'fk_summary_compliance_monitoring_compliance1',
            '{{%summary_compliance_monitoring}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%summary_compliance_monitoring}}');
    }
}
