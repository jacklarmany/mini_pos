<?php

use yii\db\Migration;

class m220714_095553_create_table_m_type_accident_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_type_accident_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->comment('Name translate'),
                'language' => $this->string(42)->comment('Language code'),
                'm_type_accident_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table type accident'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_type_accident_translate_m_type_accident1_idx', '{{%m_type_accident_translate}}', ['m_type_accident_id']);

        $this->addForeignKey(
            'fk_m_type_accident_translate_m_type_accident1',
            '{{%m_type_accident_translate}}',
            ['m_type_accident_id'],
            '{{%m_type_accident}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_type_accident_translate}}');
    }
}
