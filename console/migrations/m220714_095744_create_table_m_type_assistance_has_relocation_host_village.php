<?php

use yii\db\Migration;

class m220714_095744_create_table_m_type_assistance_has_relocation_host_village extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_type_assistance_has_relocation_host_village}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'value' => $this->decimal(12, 2)->comment('Value ($)'),
                'm_relocation_host_village_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table relocation host village'),
                'contribution_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table contribution type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_type_assistance_has_relocation_host_village_contributi_idx', '{{%m_type_assistance_has_relocation_host_village}}', ['contribution_type_id']);
        $this->createIndex('fk_m_type_assistance_has_relocation_host_village_m_relocati_idx', '{{%m_type_assistance_has_relocation_host_village}}', ['m_relocation_host_village_id']);

        $this->addForeignKey(
            'fk_m_type_assistance_has_relocation_host_village_contribution1',
            '{{%m_type_assistance_has_relocation_host_village}}',
            ['contribution_type_id'],
            '{{%contribution_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_type_assistance_has_relocation_host_village_m_relocation1',
            '{{%m_type_assistance_has_relocation_host_village}}',
            ['m_relocation_host_village_id'],
            '{{%m_relocation_host_village}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_type_assistance_has_relocation_host_village}}');
    }
}
