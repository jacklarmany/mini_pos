<?php

use yii\db\Migration;

class m220714_095712_create_table_m_investment_problem extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%m_investment_problem}}',
            [
                'id' => $this->primaryKey()->comment('Primary key of table is auto increment'),
                'other_by_type' => $this->text()->comment('Other details  (if have type choice  other)'),
                'm_type_problem_id' => $this->integer()->comment('Is foreign keys from relation table type problem'),
                'title_id' => $this->integer()->unsigned()->notNull()->comment('Is foreign keys from relation table title'),
                'monitoring_id' => $this->integer()->notNull()->comment('Is foreign keys from relation table monitoring'),
            ],
            $tableOptions
        );

        $this->createIndex('fk_m_investment_problem_m_type_problem1_idx', '{{%m_investment_problem}}', ['m_type_problem_id']);
        $this->createIndex('fk_m_investment_problem_title_has_monitoring1_idx', '{{%m_investment_problem}}', ['title_id', 'monitoring_id']);

        $this->addForeignKey(
            'fk_m_investment_problem_m_type_problem1',
            '{{%m_investment_problem}}',
            ['m_type_problem_id'],
            '{{%m_type_problem}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%m_investment_problem}}');
    }
}
