<?php

use yii\db\Migration;

class m220714_095716_create_table_m_mineral_form_outside extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_mineral_form_outside}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_has_mineral_outside' => $this->tinyInteger()->comment('Is has mineral outside'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table complaince'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_mineral_form_outside_compliance1_idx', '{{%m_mineral_form_outside}}', ['compliance_id']);
        $this->createIndex('fk_m_mineral_form_outside_title_has_monitoring1_idx', '{{%m_mineral_form_outside}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_mineral_form_outside_compliance1',
            '{{%m_mineral_form_outside}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_mineral_form_outside}}');
    }
}
