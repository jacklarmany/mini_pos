<?php

use yii\db\Migration;

class m220714_095733_create_table_m_relocation_host_village extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_relocation_host_village}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_relocation_host_village' => $this->tinyInteger()->comment('is has relocation host village'),
                'ref_document' => $this->tinyInteger()->comment('Reference document'),
                'compliance_id' => $this->integer()->unsigned()->comment('Is foreign keys from relation table compliance '),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_relocation_host_village_compliance1_idx', '{{%m_relocation_host_village}}', ['compliance_id']);
        $this->createIndex('fk_relocation_host_village_title_has_monitoring1_idx', '{{%m_relocation_host_village}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_relocation_host_village_compliance1',
            '{{%m_relocation_host_village}}',
            ['compliance_id'],
            '{{%compliance}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_relocation_host_village}}');
    }
}
