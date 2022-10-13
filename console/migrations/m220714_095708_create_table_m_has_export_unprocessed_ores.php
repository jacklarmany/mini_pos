<?php

use yii\db\Migration;

class m220714_095708_create_table_m_has_export_unprocessed_ores extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_has_export_unprocessed_ores}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'volume_ton' => $this->string(45)->comment('Volume (tons/livestock units) '),
                'value' => $this->decimal(12, 2)->comment('Value'),
                'export_country' => $this->string()->comment('Export country'),
                'mineral_id' => $this->integer()->notNull()->comment('Is foreign key from relation table mineral'),
                'm_export_unprocessed_ores_id' => $this->integer()->notNull()->comment('Is foreign key from relation table export unprocessed ores'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_has_export_unprocessed_m_export_unprocessed_ores1_idx', '{{%m_has_export_unprocessed_ores}}', ['m_export_unprocessed_ores_id']);
        $this->createIndex('fk_m_has_export_unprocessed_mineral1_idx', '{{%m_has_export_unprocessed_ores}}', ['mineral_id']);

        $this->addForeignKey(
            'fk_m_has_export_unprocessed_mineral1',
            '{{%m_has_export_unprocessed_ores}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_has_export_unprocessed_m_export_unprocessed_ores1',
            '{{%m_has_export_unprocessed_ores}}',
            ['m_export_unprocessed_ores_id'],
            '{{%m_export_unprocessed_ores}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_has_export_unprocessed_ores}}');
    }
}
