<?php

use yii\db\Migration;

class m220714_095720_create_table_m_operation_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_operation_type}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table conpliance'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_operation_type_compliance1_idx', '{{%m_operation_type}}', ['compliance_id']);
        $this->createIndex('fk_operation_type_title_has_monitoring1_idx', '{{%m_operation_type}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_operation_type_compliance1',
            '{{%m_operation_type}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_operation_type}}');
    }
}
