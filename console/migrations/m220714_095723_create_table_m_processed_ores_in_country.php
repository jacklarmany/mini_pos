<?php

use yii\db\Migration;

class m220714_095723_create_table_m_processed_ores_in_country extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_processed_ores_in_country}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_has_processed_in_country' => $this->tinyInteger()->comment('is has processed in country'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliane'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_processed_ores_in_country_compliance1_idx', '{{%m_processed_ores_in_country}}', ['compliance_id']);
        $this->createIndex('fk_m_processed_ores_in_country_title_has_monitoring1_idx', '{{%m_processed_ores_in_country}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_processed_ores_in_country_compliance1',
            '{{%m_processed_ores_in_country}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_processed_ores_in_country}}');
    }
}
