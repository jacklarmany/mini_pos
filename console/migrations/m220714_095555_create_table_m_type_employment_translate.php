<?php

use yii\db\Migration;

class m220714_095555_create_table_m_type_employment_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_type_employment_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Name translate'),
                'language' => $this->string(45)->comment('Language code'),
                'm_type_employment_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table type employment'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_type_employment_translate_m_type_employment1_idx', '{{%m_type_employment_translate}}', ['m_type_employment_id']);

        $this->addForeignKey(
            'fk_m_type_employment_translate_m_type_employment1',
            '{{%m_type_employment_translate}}',
            ['m_type_employment_id'],
            '{{%m_type_employment}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_type_employment_translate}}');
    }
}
