<?php

use yii\db\Migration;

class m220714_095709_create_table_m_international_standard extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_international_standard}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'is_international_standard' => $this->tinyInteger()->comment('Is international standard'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
                'm_type_standard_id' => $this->integer()->comment('Is foreign keys from relation table type standard'),
                'name_by_condition_type' => $this->string()->comment('Other detail with condition standard type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_international_standard_title_has_monitoring1_idx', '{{%m_international_standard}}', ['title_id', 'monitoring_id']);
        $this->createIndex('fk_m_international_standard_m_type_standard1_idx', '{{%m_international_standard}}', ['m_type_standard_id']);

        $this->addForeignKey(
            'fk_m_international_standard_m_type_standard1',
            '{{%m_international_standard}}',
            ['m_type_standard_id'],
            '{{%m_type_standard}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_international_standard}}');
    }
}
