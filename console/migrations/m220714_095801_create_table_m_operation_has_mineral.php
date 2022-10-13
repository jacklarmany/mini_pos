<?php

use yii\db\Migration;

class m220714_095801_create_table_m_operation_has_mineral extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_operation_has_mineral}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'value_ton' => $this->string(45)->comment('Volume (tons)'),
                'mineral_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table mineral'),
                'm_operation_type_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table operation type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_operation_has_mineral_m_operation_type1_idx', '{{%m_operation_has_mineral}}', ['m_operation_type_id']);
        $this->createIndex('fk_operation_has_mineral_mineral1_idx', '{{%m_operation_has_mineral}}', ['mineral_id']);

        $this->addForeignKey(
            'fk_m_operation_has_mineral_m_operation_type1',
            '{{%m_operation_has_mineral}}',
            ['m_operation_type_id'],
            '{{%m_operation_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'fk_operation_has_mineral_mineral1',
            '{{%m_operation_has_mineral}}',
            ['mineral_id'],
            '{{%mineral}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_operation_has_mineral}}');
    }
}
