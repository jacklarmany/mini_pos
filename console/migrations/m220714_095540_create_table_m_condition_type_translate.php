<?php

use yii\db\Migration;

class m220714_095540_create_table_m_condition_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_condition_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'language' => $this->string(45)->comment('Language code'),
                'name' => $this->string()->notNull()->comment('Condition type name translate'),
                'm_condition_type_id' => $this->integer()->notNull()->comment('Condition type ID is foreign keys from relation table condition type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_condition_type_translate_m_condition_type1_idx', '{{%m_condition_type_translate}}', ['m_condition_type_id']);

        $this->addForeignKey(
            'fk_m_condition_type_translate_m_condition_type1',
            '{{%m_condition_type_translate}}',
            ['m_condition_type_id'],
            '{{%m_condition_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_condition_type_translate}}');
    }
}
