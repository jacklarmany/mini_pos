<?php

use yii\db\Migration;

class m220714_095656_create_table_m_contractual_contrubution_has_compliance extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_contractual_contrubution_has_compliance}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'ref_document' => $this->tinyInteger()->comment('Reference document '),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('is foreign key from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('is foreign key from relation table monitoring'),
                'compliance_id' => $this->integer()->unsigned()->comment('is foreign key from relation table complaince'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_contractual_contrubution_has_compliance_compliance1_idx', '{{%m_contractual_contrubution_has_compliance}}', ['compliance_id']);
        $this->createIndex('fk_m_contractual_contrubution_has_compliance_title_has_moni_idx', '{{%m_contractual_contrubution_has_compliance}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_contractual_contrubution_has_compliance_compliance1',
            '{{%m_contractual_contrubution_has_compliance}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_contractual_contrubution_has_compliance}}');
    }
}
