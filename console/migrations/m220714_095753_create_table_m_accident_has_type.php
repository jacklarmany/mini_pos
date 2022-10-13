<?php

use yii\db\Migration;

class m220714_095753_create_table_m_accident_has_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_accident_has_type}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'total_number' => $this->integer()->comment('Total number accident'),
                'assistance' => $this->string()->comment('Assistance accident'),
                'm_has_accident_project_id' => $this->integer()->notNull()->comment('m_has_accident_project_id is foreign keys from relation table m_has_accident_project'),
                'm_type_accident_id' => $this->integer()->notNull()->comment('m_type_accident_id is foreign keys from relation table m_type_accident'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_accident_has_type_m_has_accident_project1_idx', '{{%m_accident_has_type}}', ['m_has_accident_project_id']);
        $this->createIndex('fk_m_accident_has_type_m_type_accident1_idx', '{{%m_accident_has_type}}', ['m_type_accident_id']);

        $this->addForeignKey(
            'fk_m_accident_has_type_m_has_accident_project1',
            '{{%m_accident_has_type}}',
            ['m_has_accident_project_id'],
            '{{%m_has_accident_project}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_m_accident_has_type_m_type_accident1',
            '{{%m_accident_has_type}}',
            ['m_type_accident_id'],
            '{{%m_type_accident}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_accident_has_type}}');
    }
}
