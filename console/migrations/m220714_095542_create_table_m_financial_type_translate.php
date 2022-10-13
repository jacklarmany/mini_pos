<?php

use yii\db\Migration;

class m220714_095542_create_table_m_financial_type_translate extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_financial_type_translate}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'name' => $this->string()->notNull()->comment('Name translate'),
                'language' => $this->string(2)->comment('Language code'),
                'm_financial_type_id' => $this->integer()->notNull()->comment('Is financial type'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_financial_type_translate_m_financial_type1_idx', '{{%m_financial_type_translate}}', ['m_financial_type_id']);

        $this->addForeignKey(
            'fk_m_financial_type_translate_m_financial_type1',
            '{{%m_financial_type_translate}}',
            ['m_financial_type_id'],
            '{{%m_financial_type}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_financial_type_translate}}');
    }
}
