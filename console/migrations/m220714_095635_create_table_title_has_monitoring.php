<?php

use yii\db\Migration;

class m220714_095635_create_table_title_has_monitoring extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%title_has_monitoring}}',
            [
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'completed_as_planned' => $this->tinyInteger()->comment('Is has completed as planned'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'document' => $this->string()->comment('Details'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance'),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%title_has_monitoring}}', ['title_id', 'monitoring_id']);

        $this->createIndex('fk_title_has_monitoring_compliance1_idx', '{{%title_has_monitoring}}', ['compliance_id']);
        $this->createIndex('fk_title_has_monitoring_monitoring1_idx', '{{%title_has_monitoring}}', ['monitoring_id']);
        $this->createIndex('fk_title_has_monitoring_title1_idx', '{{%title_has_monitoring}}', ['title_id']);

        $this->addForeignKey(
            'fk_title_has_monitoring_compliance1',
            '{{%title_has_monitoring}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_title_has_monitoring_title1',
            '{{%title_has_monitoring}}',
            ['title_id'],
            '{{%title}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%title_has_monitoring}}');
    }
}
