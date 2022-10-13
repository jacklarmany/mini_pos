<?php

use yii\db\Migration;

class m220714_095659_create_table_m_env_measure extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_env_measure}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_env_measure_compliance1_idx', '{{%m_env_measure}}', ['compliance_id']);
        $this->createIndex('fk_m_env_measure_title_has_monitoring1_idx', '{{%m_env_measure}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_env_measure_compliance1',
            '{{%m_env_measure}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_env_measure}}');
    }
}
