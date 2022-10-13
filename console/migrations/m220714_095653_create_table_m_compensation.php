<?php

use yii\db\Migration;

class m220714_095653_create_table_m_compensation extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_compensation}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_compensation' => $this->tinyInteger()->comment('Are there any compensations?'),
                'completed_or_not' => $this->tinyInteger()->comment('Completed or Not Completed'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Compliance ID is foreign keys from table relation table compliance'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Title ID is foreign keys from table relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Monitoring ID is foreign keys from table relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_compensation_compliance1_idx', '{{%m_compensation}}', ['compliance_id']);
        $this->createIndex('fk_m_compensation_title_has_monitoring1_idx', '{{%m_compensation}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_compensation_compliance1',
            '{{%m_compensation}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_compensation}}');
    }
}
