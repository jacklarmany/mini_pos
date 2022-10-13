<?php

use yii\db\Migration;

class m220714_095722_create_table_m_position extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_position}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'position_name' => $this->string()->comment('Position name'),
                'total_number' => $this->integer()->comment('Total all'),
                'female' => $this->integer()->comment('Total female'),
                'm_lao_employee_promoted_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table lao employee promted'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_position_m_lao_employee_promoted1_idx', '{{%m_position}}', ['m_lao_employee_promoted_id']);

        $this->addForeignKey(
            'fk_m_position_m_lao_employee_promoted1',
            '{{%m_position}}',
            ['m_lao_employee_promoted_id'],
            '{{%m_lao_employee_promoted}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_position}}');
    }
}
